<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PropertyRepository;
use App\Repositories\PropertyImageRepository;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    protected $propertyRepository;
    protected $propertyImageRepository;

    public function __construct(PropertyRepository $propertyRepository,PropertyImageRepository $propertyImageRepository) {
        $this->propertyRepository = $propertyRepository;
        $this->propertyImageRepository = $propertyImageRepository;
    }

    public function index(Request $request){
        $filters = $request->only(['city', 'capacity', 'min_price', 'max_price']);
        
        if (!empty($filters)) {
            $properties = $this->propertyRepository->searchProperties($filters);
        } else {
            $properties = $this->propertyRepository->getAvailableProperties();
        }

        return response()->json(['properties' => $properties]);
    }

    public function show($id){
        $property = $this->propertyRepository->find($id);
        
        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        $property->images = $this->propertyImageRepository->getImagesByProperty($property->id);

        return response()->json(['property' => $property]);
    }

    public function store(Request $request){
        $user = Auth::user();
        
        if (!$user->isHost()) {
            return response()->json(['message' => 'Only hosts can create properties'], 403);
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
            'images.*' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create property
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

        // Upload and save images
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

        return response()->json([
            'message' => 'Property created successfully and pending approval',
            'property' => $property
        ], 201);
    }
}
