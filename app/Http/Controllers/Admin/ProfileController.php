<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
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
            case 'email':
                $validationRules['email'] = 'required|email|unique:users,email';
                break;
                // ... add other fields and validation rules here
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
                'field' => $field,
                $field => $user->$field, // Updated value
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            // Handle errors gracefully, log for debugging, and return informative JSON response
            Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred while updating the field.'], 500);
        }
    }
}
