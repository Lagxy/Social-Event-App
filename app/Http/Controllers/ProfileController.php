<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function updatePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail(Auth::id());
        
        if ($request->hasFile('profile_picture')) {
            // Delete old image if exists
            if ($user->image_path) {
                Storage::disk('public')->delete($user->image_path);
            }
            
            $file = $request->file('profile_picture');
            $filename = $file->hashName(); // Generates unique filename
            $file->storeAs('profile-pictures', $filename, 'public');
            $user->update(['image_path' => $filename]);
        }

        return back()->with('success', 'Profile picture updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::findOrFail(Auth::id());

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect']);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password updated successfully!');
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255|unique:users,email,'.Auth::id(),
            'current_password' => 'required',
        ]);

        $user = User::findOrFail(Auth::id());

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password is incorrect']);
        }

        $user->update([
            'email' => $request->email,
            'email_verified_at' => null
        ]);

        return back()->with('success', 'Email updated successfully! Please verify your new email.');
    }
}