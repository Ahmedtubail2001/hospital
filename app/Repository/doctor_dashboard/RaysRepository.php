<?php

namespace App\Repository\doctor_dashboard;

use App\Interface\doctor_dashboard\RaysRepositoryInterface;
use App\Models\Ray;

class RaysRepository implements RaysRepositoryInterface
{

    public function store($request)
    {
        try {
            Ray::create([
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'invoice_id' => $request->invoice_id,
                'patient_id' => $request->patient_id,
                'doctor_id' => $request->doctor_id,
            ]);
            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            $Ray = Ray::findOrFail($id);
            $Ray->update([
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar
            ]);
            session()->flash('edit');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Ray::destroy($id);
            session()->flash('delete');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}