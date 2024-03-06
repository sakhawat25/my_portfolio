<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEducationRequest;
use App\Models\Education;

class AcademicsController extends Controller
{
    /*
     * For displaying main page of academics module
     */
    public function index()
    {
        $user = auth()->user();

        // $showModal = true;

        return view('admin.academics.index', compact('user'));
    }

    /*
     * For storing education redord
     */
    public function storeEducation(StoreEducationRequest $request)
    {
        $validatedData = $request->validated();

        if (empty($validatedData['sort'])) {
            $validatedData['sort'] = 1;
        }

        Education::create($validatedData);

        return back()->with('message', 'Education record added successfully!');
    }

    /*
     * For showing education redord (AJAX Request)
     * return json response
     */
    public function showEducation(Education $education)
    {
        return response()->json($education);
    }
}
