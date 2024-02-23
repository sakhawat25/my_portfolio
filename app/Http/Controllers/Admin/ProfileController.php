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
        $imageName = time().'_'.date('d-m-Y').'.'.$image->getClientOriginalExtension();
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
            $fileName = $cv->getClientOriginalName();
            $cv->move(public_path('files'), $fileName);
            $validatedData['cv'] = $fileName;

            // store cv image
            $filePath = public_path('files/'.$fileName);
            $pdf = new Pdf($filePath);
            $cvImageName = time().'_'.date('d-m-Y').'.png';
            $pdf->saveImage(public_path('images/'.$cvImageName));
            $validatedData['cv_image'] = $cvImageName;
        }

        auth()->user()->update($validatedData);

        return redirect()->back()->with('message', 'Your personal information has been updated.');
    }
}
