<?php

namespace App\Repository\Services;

use App\Interface\Services\SingleServiceRepositoryInterface;
use App\Models\Service;

class SingleServiceRepository implements SingleServiceRepositoryInterface
{
    public function index()
    {
        $services = Service::all();
        return view('Dashboard.Services.SingleService.index', compact('services'));

    }

    public function store($request)
    {
        try {
            $SingleService = new Service();
            $SingleService->price = $request->price;
            $SingleService->description_en = $request->description_en;
            $SingleService->description_ar = $request->description_ar;
            $SingleService->status = 1;
            $SingleService->name_en = $request->name_en;
            $SingleService->name_ar = $request->name_ar;

            $SingleService->save();

            session()->flash('add');
            return redirect()->route('Service.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update($request)
    {
        try {

            $SingleService = Service::findOrFail($request->id);
            $SingleService->price = $request->price;
            $SingleService->description_en = $request->description_en;
            $SingleService->description_ar = $request->description_ar;
            $SingleService->status = $request->status;
            $SingleService->name_en = $request->name_en;
            $SingleService->name_ar = $request->name_ar;


            $SingleService->save();

            session()->flash('edit');
            return redirect()->route('Service.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            // dd($SingleService);

        }

    }

    public function destroy($request)
    {
        Service::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('Service.index');
    }

}