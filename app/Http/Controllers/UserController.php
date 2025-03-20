<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function profile(){
        $user = Auth::user();
        return response()->json(['user' => $user]);
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:20',
            'profile_image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['name', 'phone']);

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image) {
                Storage::delete('public/profiles/' . $user->profile_image);
            }

            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->storeAs('public/profiles', $imageName);
            $data['profile_image'] = $imageName;
        }

        $this->userRepository->update($user->id, $data);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $this->userRepository->find($user->id)
        ]);
    }

    public function changePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'message' => 'Current password is incorrect'
            ], 422);
        }

        $this->userRepository->update($user->id, [
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'Password changed successfully'
        ]);
    }

}