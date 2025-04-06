<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()
                ->withErrors(['email' => 'Invalid login credentials'])
                ->withInput($request->except('password'));
        }

        $user = Auth::user();
        
        if (!$user->is_active) {
            Auth::logout();
            return redirect()->route('login')
                ->withErrors(['email' => 'Your account has been deactivated']);
        }

        return redirect()->intended(route('home'))
            ->with('success', 'Login successful');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:traveler,host',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        $user = $this->userRepository->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'is_active' => true,
        ]);

        Auth::login($user);

        return redirect()->route('home')
            ->with('success', 'Registration successful! Welcome to our platform.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home')
            ->with('success', 'Logged out successfully');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        return redirect()->route('login')
            ->with('success', 'Password reset link sent to your email');
    }
}
