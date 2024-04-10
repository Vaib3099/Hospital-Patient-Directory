<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Http\Requests\StoreHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Rap2hpoutre\FastExcel\FastExcel;

class HospitalController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-hospital|edit-hospital|delete-hospital', ['only' => ['index','show']]);
       $this->middleware('permission:create-hospital', ['only' => ['create','store']]);
       $this->middleware('permission:edit-hospital', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-hospital', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('hospitals.index', [
            'hospitals' => Hospital::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('hospitals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHospitalRequest $request): RedirectResponse
    {
        Hospital::create($request->all());
        return redirect()->route('hospitals.index')
                ->withSuccess('New Hospital is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital): View
    {
        return view('hospitals.show', [
            'hospital' => $hospital
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital): View
    {
        return view('hospitals.edit', [
            'hospital' => $hospital
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHospitalRequest $request, Hospital $hospital): RedirectResponse
    {
        $hospital->update($request->all());
        return redirect()->back()
                ->withSuccess('Hospital is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital): RedirectResponse
    {
        $hospital->delete();
        return redirect()->route('hospitals.index')
                ->withSuccess('Hospital is deleted successfully.');
    }

    public function hospitalexport()
    {
        $hospital = Hospital::all();

        return (new FastExcel($hospital))->download('hospitals.xlsx');
    }
}
