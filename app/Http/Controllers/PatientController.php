<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Hospital;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Rap2hpoutre\FastExcel\FastExcel;

class PatientController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-patient|edit-patient|delete-patient', ['only' => ['index','show']]);
       $this->middleware('permission:create-patient', ['only' => ['create','store']]);
       $this->middleware('permission:edit-patient', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-patient', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        /*return view('patients.index', [
            'patients' => Patient::latest()->paginate(3)
        ]);*/

        $query = Patient::query();

        // Filter by start date
        if ($request->has('start_date')) {
            if(!empty($request->input('start_date'))){
                $query->whereDate('created_at', '>=', $request->input('start_date'));
            }
        }

        // Filter by end date
        if ($request->has('end_date')) {
            if(!empty($request->input('end_date'))){
                $query->whereDate('created_at', '<=', $request->input('end_date'));
            }
        }

        // Filter by hospital
        if ($request->has('hospital_id')) {
            if(!empty($request->input('hospital_id'))){
                $query->where('hospital_id', $request->input('hospital_id'));
            }
        }

        // Get filtered patients with pagination
        $patients = $query->paginate(10);

        // Get all hospitals for the dropdown
        $hospitals = Hospital::all();

        return view('patients.index', [
            'patients' => $patients,
            'hospitals' => $hospitals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $hospitals = Hospital::all();
        return view('patients.create', [
            'hospitals' => $hospitals
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request): RedirectResponse
    {
        // dd($request);
        $validatedData = $request->all();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            
            $validatedData['photo'] = $photoPath;
        }
        
        Patient::create($validatedData);
        return redirect()->route('patients.index')
                ->withSuccess('New Patient is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient): View
    {
        return view('patients.show', [
            'patient' => $patient
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient): View
    {
        $hospitals = Hospital::all();
        return view('patients.edit', [
            'patient' => $patient,
            'hospitals' => $hospitals
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient): RedirectResponse
    {
        // dd($request);
        $validatedData = $request->all();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validatedData['photo'] = $photoPath;
        }

        $patient->update($validatedData);
        return redirect()->back()
                ->withSuccess('Patient is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient): RedirectResponse
    {
        $patient->delete();
        return redirect()->route('patients.index')
                ->withSuccess('Patient is deleted successfully.');
    }

    public function patientexport()
    {
        $patient = Patient::all();

        return (new FastExcel($patient))->download('patients.xlsx');
    }
}
