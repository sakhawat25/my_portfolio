<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEducationRequest;

class AcademicsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // $showModal = true;

        return view('admin.academics.index', compact('user'));
    }

    public function storeEducation(StoreEducationRequest $request)
    {
        dd($request->all());
    }
}
