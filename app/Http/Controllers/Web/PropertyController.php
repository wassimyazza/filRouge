<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Repositories\PropertyRepository;
use Illuminate\Support\Facades\Validator;
use App\Repositories\PropertyImageRepository;
use App\Repositories\ReviewRepository;

class PropertyController extends Controller
{
    protected $propertyRepository;
    protected $propertyImageRepository;
    protected $reviewRepository;

    public function __construct(PropertyRepository $propertyRepository,PropertyImageRepository $propertyImageRepository,ReviewRepository $reviewRepository) {
        $this->propertyRepository = $propertyRepository;
        $this->propertyImageRepository = $propertyImageRepository;
        $this->reviewRepository = $reviewRepository;
    }

    public function index(Request $request){
        $filters = $request->only(['city', 'capacity', 'min_price', 'max_price']);
        
        if (!empty($filters)) {
            $properties = $this->propertyRepository->searchProperties($filters);
        } else {
            $properties = $this->propertyRepository->getAvailableProperties();
        }

        foreach ($properties as $property) {
            $property->main_image = $this->propertyImageRepository->getMainImage($property->id);
            $property->avg_rating = $property->getAverageRatingAttribute();
        }

        return view('properties.index', compact('properties', 'filters'));
    }

    public function show($id){
        $property = $this->propertyRepository->find($id);
        
        if (!$property) {
            return redirect()->route('properties.index')
                ->with('error', 'Property not found');
        }

        $property->images = $this->propertyImageRepository->getImagesByProperty($property->id);
        $reviews = $this->reviewRepository->getReviewsByProperty($property->id);
        
        foreach ($reviews as $review) {
            $review->traveler_name = $review->traveler->name;
            $review->traveler_image = $review->traveler->profile_image;
        }

        return view('properties.show', compact('property', 'reviews'));
    }

    public function create(){
        $user = Auth::user();
        
        if (!$user->isHost()) {
            return redirect()->route('properties.index')
                ->with('error', 'Only hosts can create properties');
        }

        $property_types = ['apartment', 'house', 'villa', 'cabin', 'condo', 'studio'];
        
        return view('properties.create', compact('property_types'));
    }

    public function store(Request $request){
        $user = Auth::user();
        
        if (!$user->isHost()) {
            return redirect()->route('properties.index')
                ->with('error', 'Only hosts can create properties');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:50',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $property = $this->propertyRepository->create([
            'host_id' => $user->id,
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'city' => $request->city,
            'address' => $request->address,
            'price_per_night' => $request->price_per_night,
            'capacity' => $request->capacity,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'is_available' => true,
            'is_approved' => false, // Requires admin approval
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageName = time() . '_' . $index . '.' . $image->extension();
                $image->storeAs('public/properties', $imageName);
                
                $this->propertyImageRepository->create([
                    'property_id' => $property->id,
                    'image_path' => $imageName,
                    'is_main' => $index === 0, // First image is the main image
                ]);
            }
        }

        return redirect()->route('host.properties')
            ->with('success', 'Property created successfully and pending approval');
    }

    public function update(Request $request, $id){
        $user = Auth::user();
        $property = $this->propertyRepository->find($id);
        
        if (!$property) {
            return redirect()->route('host.properties')
                ->with('error', 'Property not found');
        }

        if ($property->host_id !== $user->id && !$user->isAdmin()) {
            return redirect()->route('host.properties')
                ->with('error', 'Unauthorized access');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'type' => 'sometimes|string|max:50',
            'city' => 'sometimes|string|max:100',
            'address' => 'sometimes|string|max:255',
            'price_per_night' => 'sometimes|numeric|min:0',
            'capacity' => 'sometimes|integer|min:1',
            'bedrooms' => 'sometimes|integer|min:0',
            'bathrooms' => 'sometimes|integer|min:0',
            'is_available' => 'sometimes|boolean',
            'new_images' => 'sometimes|array',
            'new_images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->propertyRepository->update($id, $request->only([
            'title', 'description', 'type', 'city', 'address',
            'price_per_night', 'capacity', 'bedrooms', 'bathrooms', 'is_available'
        ]));

        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $index => $image) {
                $imageName = time() . '_' . $index . '.' . $image->extension();
                $image->storeAs('public/properties', $imageName);
                
                $this->propertyImageRepository->create([
                    'property_id' => $property->id,
                    'image_path' => $imageName,
                    'is_main' => false,
                ]);
            }
        }

        return redirect()->route('host.properties')
            ->with('success', 'Property updated successfully');
    }

    public function destroy($id){
        $user = Auth::user();
        $property = $this->propertyRepository->find($id);
        
        if (!$property) {
            return redirect()->route('host.properties')
                ->with('error', 'Property not found');
        }

        if ($property->host_id !== $user->id && !$user->isAdmin()) {
            return redirect()->route('host.properties')
                ->with('error', 'Unauthorized access');
        }

        $images = $this->propertyImageRepository->getImagesByProperty($id);
        foreach ($images as $image) {
            Storage::delete('public/properties/' . $image->image_path);
            $this->propertyImageRepository->delete($image->id);
        }

        $this->propertyRepository->delete($id);

        return redirect()->route('host.properties')
            ->with('success', 'Property deleted successfully');
    }

    public function myProperties(){
        $user = Auth::user();
        
        if (!$user->isHost()) {
            return redirect()->route('properties.index')
                ->with('error', 'Only hosts can access their properties');
        }

        $properties = $this->propertyRepository->getPropertiesByHost($user->id);

        foreach ($properties as $property) {
            $property->main_image = $this->propertyImageRepository->getMainImage($property->id);
        }

        return view('host.properties', compact('properties'));
    }

    public function edit($id){
        $user = Auth::user();
        $property = $this->propertyRepository->find($id);
        
        if (!$property) {
            return redirect()->route('host.properties')
                ->with('error', 'Property not found');
        }

        if ($property->host_id !== $user->id && !$user->isAdmin()) {
            return redirect()->route('host.properties')
                ->with('error', 'Unauthorized access');
        }

        $property->images = $this->propertyImageRepository->getImagesByProperty($property->id);
        $property_types = ['apartment', 'house', 'villa', 'cabin', 'condo', 'studio'];

        return view('properties.edit', compact('property', 'property_types'));
    }
}
