<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Education;

class AcademicsController extends Controller
{
    /*
     * For displaying main page of academics module
     */
    public function index()
    {
        $user = auth()->user();

        $educations = Education::select(
            'id',
            'title',
            'institution',
            'grade_type',
            'grade',
            'start_date',
            'end_date',
            'currently_studying',
            'description',
        )
            ->orderBy('sort', 'ASC')
            ->get();

        // $showModal = true;

        return view('admin.academics.index', compact('user', 'educations'));
    }

    /*
     * For storing education redord
     */
    public function storeEducation(StoreEducationRequest $request)
    {
        $validatedData = $request->validated();

        if (empty($validatedData['sort'])) {
            $validatedData['sort'] = 1;
        } elseif ($validatedData['sort'] < 1) {
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

    /*
     * Update education record
     */
    public function updateEducation(UpdateEducationRequest $request, Education $education)
    {
        $validatedData = $request->validated();

        if (!$request->has('currently_studying')) {
            $validatedData['currently_studying'] = 0;
        }

        if ($validatedData['sort'] < 1) {
            $validatedData['sort'] = 1;
        }

        $education->update($validatedData);

        return back()->with('message', 'Education record updated successfully!');
    }

    /*
     * Delete education record
     */
    public function deleteEducation(Education $education)
    {
        $education->delete();

        return back()->with('message', 'Education record deleted successfully!');
    }
}
