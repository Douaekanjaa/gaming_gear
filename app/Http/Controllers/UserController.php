<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
    try {
        $incomingFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
            $user = Auth::user();
            $role = $user->role;

            session(['role' => $role]);

            if ($role === User::ADMIN_ROLE) {
                return redirect()->route('admin.dashboard');
            } elseif ($role === User::USER_ROLE) {
                return redirect()->route('home');
            }

        }
    } catch (Exception $e) {
        return $e;
    }

    return view('login');
}

    
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public function registerForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        try {
            $incomingFields = $request->validate([
                'name' => ['required', 'min:3', 'max:20'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'role' => 'user',
                'password' => ['required', 'min:6', 'max:18', 'confirmed'],
            ]);

            
            $incomingFields['password'] = bcrypt($incomingFields['password']);
            
            $user = User::create($incomingFields);
            auth()->login($user);
            $role = $user->role;
        
            return redirect('/')->with(['role' => $role]);

        }
        catch (Exception $e) {
            echo "error $e";
        }
    }

    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlist');
    }

    public function account()
    {
        $user = Auth::user();

        if ($user) {
            return view('account', ['user' => $user]);
        } else {
            return redirect()->route('login')->with('error', 'Please login to access your account.');
        }
    }
    public function update(Request $request, User $user)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            // Add validation rules for other fields here as needed
        ]);

        // Update the user's information
        $user->update($validatedData);

        // Redirect back to the account page with a success message
        return redirect()->route('account')->with('success', 'Your information has been updated successfully.');
    }

}
