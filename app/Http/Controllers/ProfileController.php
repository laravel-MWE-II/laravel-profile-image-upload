<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // Profile picture upload/update
    public function updatePicture(Request $request)
    {
        // max 2MB = 2048 KB
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');

            $filename = time() . '_' . $file->getClientOriginalName();

            // public/uploads এ move
            $file->move(public_path('uploads'), $filename);

            $user->profile_picture = 'uploads/' . $filename;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile picture updated successfully!');
    }
}
