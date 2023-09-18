<?php

namespace App\Repository\Patients;

use App\Interface\Patients\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

class PatientRepository implements PatientRepositoryInterface
{
    public function index()
    {
        $Patients = Patient::all();
        return view('Dashboard.Patients.index', compact('Patients'));
    }

    public function create()
    {
        return view('Dashboard.Patients.create');
    }

    public function store($request)
    {
        try {
            $Patients = new Patient();
            $Patients->email = $request->email;
            $Patients->Password = Hash::make($request->Phone);
            $Patients->Date_Birth = $request->Date_Birth;
            $Patients->Phone = $request->Phone;
            $Patients->Gender = $request->Gender;
            $Patients->Blood_Group = $request->Blood_Group;
            $Patients->name_en = $request->name_en;
            $Patients->name_ar = $request->name_ar;
            $Patients->Address_en = $request->Address_en;
            $Patients->Address_ar = $request->Address_ar;
            $Patients->save();

            session()->flash('add');
            // return redirect()->back();
            return redirect()->route('Patients.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $Patient = Patient::findorfail($id);
        return view('Dashboard.Patients.edit', compact('Patient'));
    }
    
    public function update($request)
    {
        $Patient = Patient::findOrFail($request->id);
        $Patient->email = $request->email;
        $Patient->Password = Hash::make($request->Phone);
        $Patient->Date_Birth = $request->Date_Birth;
        $Patient->Phone = $request->Phone;
        $Patient->Gender = $request->Gender;
        $Patient->Blood_Group = $request->Blood_Group;
        $Patient->name_en = $request->name_en;
        $Patient->name_ar = $request->name_ar;
        $Patient->Address_en = $request->Address_en;
        $Patient->Address_ar = $request->Address_ar;

        $Patient->save();
        session()->flash('edit');
        return redirect()->route('Patients.index');
    }

    public function destroy($request)
    {
        Patient::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }

    // public function Show($id)
    // {
    //     $Patient = patient::findorfail($id);
    //     $invoices = Invoice::where('patient_id', $id)->get();
    //     $receipt_accounts = ReceiptAccount::where('patient_id', $id)->get();
    //     $Patient_accounts = PatientAccount::where('patient_id', $id)->get();

    //     return view('Dashboard.Patients.show', compact('Patient', 'invoices', 'receipt_accounts', 'Patient_accounts'));
    // }

}