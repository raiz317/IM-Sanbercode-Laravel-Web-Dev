<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showregister()
    {
        return view('auth.register');
    }

    public function registeruser(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|string|min:5|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'], // Pastikan email dimasukkan
            'password' => Hash::make($validatedData['password']),
            'role' => User::count() === 0 ? 'admin' : 'user'
        ]);

        auth()->login($user);

        return redirect('/home')->with('success', 'Registration Berhasil!');
        // $request->validate([
        //     'name' => 'required|min:5',
        //     'email' => 'required|email',
        //     'password' => 'required|min:8|confirmed'
        // ]);

        // $userCount = User::count();

        // $user = new User;
        // $user->name = $request->input('name');
        // $user->password = Hash::make ($request->input('password'));
        // $user->role = $userCount === 0 ? 'admin' : 'user';

        // $user->save();

        // return redirect('/home');
    }
    public function showlogin()
    {
        return view('auth.login');

    }
    public function login(Request $request)
    {
        
        $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/')->with('success', 'Logout Berhasil!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/')->with('success', 'Logout Berhasil!');
    }
    public function getprofile(Request $request)
    {
        $userAuth = Auth::User()->profile;

        $userId = Auth::id();

        $profileData = Profile::where('user_id', $userId)->first();

        if($userAuth){
            return view ("profile.edit", ["profile" => $profileData]);
        }else{
            return view ("profile.create");
        }
    }
    public function createprofile(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required|min:5',
        ]);

        $userId = Auth::id();

        $profile = new Profile;
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');
        $profile->user_id = $userId;

        $profile->save();

        return redirect('/profile');
    }
    public function updateprofile(Request $request, $id)
    {
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required|min:5',
        ]);

        $profile = Profile::find($id);
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');

        $profile->save();

        return redirect('/profile')->with('success', 'Update Profile Berhasil!');
    }
}
