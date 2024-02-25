<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Spatie\PdfToImage\Pdf;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('admin.profile.index', compact('user'));
    }

    public function updateField(Request $request, $field)
    {
        $user = auth()->user();
        $validationRules = [];

        // Determine field and validation rules based on request
        switch ($field) {
            case 'first_name':
                $validationRules['first_name'] = 'required|string|max:255';
                break;

            case 'last_name':
                $validationRules['last_name'] = 'required|string|max:255';
                break;

            case 'email':
                $validationRules['email'] = 'required|email|unique:users,email';
                break;

            case 'github_link':
                $validationRules['github_link'] = 'nullable|url|string|max:255';
                break;

            case 'linkedin_link':
                $validationRules['linkedin_link'] = 'nullable|url|string|max:255';
                break;

            case 'twitter_link':
                $validationRules['twitter_link'] = 'nullable|url|string|max:255';
                break;

            case 'address':
                $validationRules['address'] = 'nullable|string|max:255';
                break;

            case 'date_of_birth':
                $validationRules['date_of_birth'] = 'nullable|date|max:255';
                break;

            case 'country':
                $validationRules['country'] = 'nullable|string|max:255';
                break;

            case 'state':
                $validationRules['state'] = 'nullable|string|max:255';
                break;

            case 'city':
                $validationRules['city'] = 'nullable|string|max:255';
                break;

            default:
                return response()->json(['error' => 'Invalid field'], 400);
        }

        // Validate the request
        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->toJson()], 400);
        }

        try {
            // Update the user's field using prepared statements or parameterized queries
            DB::table('users')
                ->where('id', $user->id)
                ->update([$field => $request->get($field)]);

            // Prepare successful response
            $response = [
                'success' => true,
                'message' => 'Record updated successfully',
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            // Handle errors gracefully, log for debugging, and return informative JSON response
            Log::error($e->getMessage());

            return response()->json(['error' => 'An error occurred while updating the field.'], 500);
        }
    }

    /*
     * Updates profile picture
     */
    public function updatePicture(Request $request)
    {
        // Validation
        $validationRules = [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024',
        ];

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update
        $image = $request->file('image');
        $imageName = time() . '_' . date('d-m-Y') . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        return redirect()->back()->with('message', 'Your profile picture has been updated.');
    }

    /*
     * Right side of profile page
     */
    public function updatePersonalInfo(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'titles' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf|max:2048',
            'introduction' => 'nullable|string',
        ]);

        // User titles update
        $titles = json_decode($request->titles);

        $titlesArray = [];

        foreach ($titles as $title) {
            array_push($titlesArray, $title->value);
        }

        $titles = join(', ', $titlesArray);

        $validatedData['titles'] = $titles;

        // Update cv
        if ($request->hasFile('cv')) {
            // Store cv
            $cv = $request->file('cv');
            $fileName = uniqid() . '.' . $cv->getClientOriginalExtension();
            $cv->move(public_path('files'), $fileName);
            $validatedData['cv'] = $fileName;

            // store cv image
            // Get the imageDataUrl from the client-side
            $imageDataUrl = $request->cv_image;

            // Remove the "data:image/png;base64," from the imageDataUrl
            $base64_string = preg_replace('/^data:image\/\w+;base64,/', '', $imageDataUrl);

            // Decode the base64 string into binary data
            $imageData = base64_decode($base64_string);

            // Define the file name for the new image (you can customize the file name as needed)
            $imageName = time() . '_' . date('d-m-Y') . '.png';

            // Specify the path where you want to save the image
            $path = public_path('images/' . $imageName);  // Example: 'images/new_image.png'

            // Save the image data to the specified path
            file_put_contents($path, $imageData);

            $validatedData['cv_image'] = $imageName;
        }

        auth()->user()->update($validatedData);

        return redirect()->back()->with('message', 'Your personal information has been updated.');
    }
}
