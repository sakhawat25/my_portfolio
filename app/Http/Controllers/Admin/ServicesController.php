<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::select('id', 'title', 'logo', 'description')->orderBy('sort', 'ASC')->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = date('Y-m-d').'_'.time().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('images'), $logoName);
            $validatedData['logo'] = $logoName;
        } else {
            $validatedData['logo'] = 'no-image.jpg';
        }

        // Set default value for sort
        $validatedData['sort'] = isset($validatedData['sort']) && $validatedData['sort'] >= 1 ? $validatedData['sort'] : 1;

        Service::create($validatedData);

        return back()->with('message', 'Service record added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $validatedData = $request->validated();

        // Handle sort field
        $validatedData['sort'] = isset($validatedData['sort']) && $validatedData['sort'] >= 1 ? $validatedData['sort'] : $service->sort;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = date('Y-m-d').'_'.time().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('images'), $logoName);
            $validatedData['logo'] = $logoName;
        } else {
            $validatedData['logo'] = $service->logo;
        }

        $service->update($validatedData);

        return back()->with('message', 'Service record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return back()->with('message', 'Service record deleted successfully!');
    }
}
