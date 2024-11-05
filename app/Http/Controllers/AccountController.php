<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::with('role')->paginate(10);  // Fetch users with their roles
        // return view('admin.account.index', compact('users'));

        $data['users'] = User::all();
        return view('roles.admin.account.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.admin.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'user_image' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);
        User::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_image' => $request->user_image,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        // return redirect()->route('admin.account.index')->with('success', 'User created successfully.');
        return redirect()->to('/account')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('roles.admin.account.edit', compact('user'));
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

        return redirect()->to('/account')->with('success', 'User updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     return redirect()->to('/account')->with('success', 'User deleted successfully.');
    // }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $imagePath = public_path('user_images/' . $user->user_image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $user->delete();

        return redirect()->to('/account')->with('success', 'User data and associated images deleted successfully.');
    }
}
