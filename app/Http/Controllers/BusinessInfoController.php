<?php

namespace App\Http\Controllers;

use App\Models\BusinessInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessInfoController extends Controller
{
    public function index()
    {
        $data['business_infos'] = BusinessInfo::all();
        return view('business_info.index', $data);
    }

    public function create()
    {
        return view('business_info.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'business_name' => 'required|string',
            'business_logo' => 'required|image',
            'business_image' => 'required|image',
            'year' => 'required|integer',
            'business_type' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
        ]);
        if ($request->hasFile('business_image')) {
            $fileName = time() . $request->file('business_image')->getClientOriginalName();
            $request->file('business_image')->move(public_path('images'), $fileName);
            $validatedData['business_image'] = $fileName;
        }
        if ($request->hasFile('business_logo')) {
            $fileName = time() . $request->file('business_logo')->getClientOriginalName();
            $request->file('business_logo')->move(public_path('logos'), $fileName);
            $validatedData['business_logo'] = $fileName;
        }
        BusinessInfo::create($validatedData);
        return redirect()
            ->to('/business')
            ->with('success', 'User created successfully.');
    }

    public function edit(string $id)
    {
        $data['business_infos'] = BusinessInfo::findOrFail($id);
        return view('business_info.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $data = BusinessInfo::findOrFail($id);
        $validatedData = $request->validate([
            'business_name' => 'required|string',
            'business_logo' => 'required|image',
            'business_image' => 'required|image',
            'year' => 'required|integer',
            'business_type' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
        ]);
        if ($request->hasFile('business_image')) {
            $fileName = time() . $request->file('business_image')->getClientOriginalName();
            $request->file('business_image')->move(public_path('images'), $fileName);
            $validatedData['business_image'] = $fileName;
        }
        if ($request->hasFile('business_logo')) {
            $fileName = time() . $request->file('business_logo')->getClientOriginalName();
            $request->file('business_logo')->move(public_path('logos'), $fileName);
            $validatedData['business_logo'] = $fileName;
        }
        
        $data->update($validatedData);

        return redirect()
            ->to('/business')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(string $id)
    {
        $data = BusinessInfo::find($id);
        // Delete the business image if it exists
    if ($data->business_image) {
        Storage::delete('public/images/' . $data->business_image);
    }

    // Delete the business logo if it exists
    if ($data->business_logo) {
        Storage::delete('public/logos/' . $data->business_logo);
    }
        $data->delete();
        return redirect()
            ->to('/business')
            ->with('success', 'User updated successfully.');
    }
}
