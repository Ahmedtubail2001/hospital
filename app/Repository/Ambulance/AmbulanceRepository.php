<?php

namespace App\Repository\Ambulance;

use App\Interface\Ambulance\AmbulanceRepositoryInterface;
use App\Models\Ambulance;

class AmbulanceRepository implements AmbulanceRepositoryInterface
{
    public function index()
    {
        $ambulances = Ambulance::all();
        return view('Dashboard.Ambulance.index', compact('ambulances'));
    }

    public function create()
    {
        return view('Dashboard.Ambulance.create');
    }

    public function store($request)
    {
        try {

            $ambulances = new Ambulance();
            $ambulances->car_number = $request->car_number;
            $ambulances->car_model_en = $request->car_model_en;
            $ambulances->car_model_ar = $request->car_model_ar;
            $ambulances->driver_license_number = $request->driver_license_number;
            $ambulances->driver_phone = $request->driver_phone;
            $ambulances->is_available = 1;
            $ambulances->car_type = $request->car_type;
            $ambulances->driver_name_en = $request->driver_name_en;
            $ambulances->driver_name_ar = $request->driver_name_ar;
            $ambulances->notes_en = $request->notes_en;
            $ambulances->notes_ar = $request->notes_ar;
            $ambulances->save();

            session()->flash('add');
            return redirect()->back();
            return redirect()->route('Ambulance.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $ambulance = Ambulance::findorfail($id);
        return view('Dashboard.Ambulance.edit', compact('ambulance'));

    }

    public function update($request)
    {
        if (!$request->has('is_available')) {
            $request->request->add(['is_available' => 0]);
        } else {
            $request->request->add(['is_available' => 1]);
        }

        $ambulance = Ambulance::findOrFail($request->id);

        $ambulance->update($request->all());

        $ambulance->car_model_en = $request->car_model_en;
        $ambulance->car_model_ar = $request->car_model_ar;
        $ambulance->driver_name_en = $request->driver_name_en;
        $ambulance->driver_name_ar = $request->driver_name_ar;
        $ambulance->notes_en = $request->notes_en;
        $ambulance->notes_ar = $request->notes_ar;
        $ambulance->save();

        session()->flash('edit');
        return redirect()->route('Ambulance.index');

    }

    public function destroy($request)
    {
        Ambulance::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }
}