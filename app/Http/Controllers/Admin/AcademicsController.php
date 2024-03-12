<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Certificate;
use App\Models\Education;
use Illuminate\Support\Facades\File;

class AcademicsController extends Controller
{
    /*
     * For displaying main page of academics module
     */
    public function index()
    {
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

        $certificates = Certificate::select(
            'id',
            'title',
            'provider',
            'issue_date',
            'expiry_date',
            'description',
            'image',
        )
            ->orderBy('sort', 'ASC')
            ->get();

        // $showModal = true;

        return view('admin.academics.index', compact('educations', 'certificates'));
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

    /*
     * For storing certificate redord
     */
    public function storeCertificate(StoreCertificateRequest $request)
    {
        $validatedData = $request->validated();

        if (empty($validatedData['sort'])) {
            $validatedData['sort'] = 1;
        } elseif ($validatedData['sort'] < 1) {
            $validatedData['sort'] = 1;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.date('d-m-Y').'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }

        Certificate::create($validatedData);

        return back()->with('message', 'Certificate record added successfully!');
    }

    /*
     * For showing education redord (AJAX Request)
     * return json response
     */
    public function showCertificate(Certificate $certificate)
    {
        return response()->json($certificate);
    }

    /*
     * Update certificate record
     */
    public function updateCertificate(UpdateCertificateRequest $request, Certificate $certificate)
    {
        $validatedData = $request->validated();

        if ($validatedData['sort'] < 1) {
            $validatedData['sort'] = 1;
        }

        if ($request->hasFile('image')) {
            // Delete previous image
            if (File::exists(asset('images/'.$certificate->image))) {
                File::delete(asset('images/'.$certificate->image));
            }

            $image = $request->file('image');
            $imageName = time().'_'.date('d-m-Y').'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $certificate->update($validatedData);

        return back()->with('message', 'Certificate record updated successfully!');
    }

    /*
     * Delete certificate record
     */
    public function deleteCertificate(Certificate $certificate)
    {
        $certificate->delete();

        return back()->with('message', 'Certificate record deleted successfully!');
    }
}
