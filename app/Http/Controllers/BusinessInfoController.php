<?php

namespace App\Http\Controllers;

use App\Models\BusinessInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            $request->file('business_image')->move(public_path('business_images'), $fileName);
            $validatedData['business_image'] = $fileName;
        }
        if ($request->hasFile('business_logo')) {
            $fileName = time() . $request->file('business_logo')->getClientOriginalName();
            $request->file('business_logo')->move(public_path('business_logos'), $fileName);
            $validatedData['business_logo'] = $fileName;
        }
        BusinessInfo::create($validatedData);
        return redirect()->to('/business')->with('success', 'Business created successfully.');
    }

    public function edit(string $id)
    {
        $data['business_infos'] = BusinessInfo::findOrFail($id);
        return view('business_info.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $data = BusinessInfo::findOrFail($id);
        $rules = [
            'business_name' => 'required|string',
            'business_logo' => 'nullable|image',
            'business_image' => 'nullable|image',
            'year' => 'required|integer',
            'business_type' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
        ];

        if (!$data->business_logo) {
            // Only require image if none exists
            $rules['business_logo'] = 'required|image';
        }

        if (!$data->business_image) {
            // Only require image if none exists
            $rules['business_image'] = 'required|image';
        }
    
        $validatedData = $request->validate($rules);

        if ($request->hasFile('business_image')) {
            $fileName = time() . $request->file('business_image')->getClientOriginalName();
            $request->file('business_image')->move(public_path('business_images'), $fileName);
            $validatedData['business_image'] = $fileName;
        }
        if ($request->hasFile('business_logo')) {
            $fileName = time() . $request->file('business_logo')->getClientOriginalName();
            $request->file('business_logo')->move(public_path('business_logos'), $fileName);
            $validatedData['business_logo'] = $fileName;
        }
        
        $data->update($validatedData);

        return redirect()->to('/business')->with('success', 'Business updated successfully.');
    }

    public function destroy($id)
    {
        $data = BusinessInfo::findOrFail($id);

        // Assuming your image path is stored in a column named 'business_image' and 'business_logo'
        $imagePath = public_path('business_images/' . $data->business_image);
        $logoPath = public_path('business_logos/' . $data->business_logo);

        // Check if the image files exist and delete them
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        if (File::exists($logoPath)) {
            File::delete($logoPath);
        }

        // Delete the record from the database
        $data->delete();

        return redirect()->to('/business')->with('success', 'Business data and associated images deleted successfully.');
    }

}
