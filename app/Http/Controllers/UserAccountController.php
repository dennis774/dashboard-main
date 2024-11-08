<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{

    public function show($id)
    {
        $user = Auth::user();

        // Additional checks can be added here
        if ($user->id != $id) {
            return redirect()->route('settings', ['id' => $user->id]);
        }

        return view('settings.account-show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('settings.account-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $rules=[
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'user_image' => 'nullable|image',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'initial' => 'required|string|max:255',
            'suffix' => 'nullable|string',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone_number' => 'required|string|max:255',
            'role' => 'required|string',
        ];
        
        
        if (!$user->user_image) {
            // Only require image if none exists
            $rules['user_image'] = 'required|image';
        }
    
        $validatedData = $request->validate($rules);
    
        // Handle image upload if new image is provided
        if ($request->hasFile('user_image')) {
            $fileName = time() . $request->file('user_image')->getClientOriginalName();
            $request->file('user_image')->move(public_path('user_images'), $fileName);
            $validatedData['user_image'] = $fileName;
        }
        
        $user->update($validatedData);

        return redirect()->to('/settings')->with('success', 'updated my account successfully.');
        
    }
}
