<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorsRequest;
use App\Interface\Doctors\DoctorRepositoryInterface;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $Doctors;

    public function __construct(DoctorRepositoryInterface $Doctors)
    {
        $this->Doctors = $Doctors;
    }
    public function index()
    {
        return $this->Doctors->index();
    }
    public function create()
    {
        return $this->Doctors->create();
    }
    public function store(StoreDoctorsRequest $request)
    {
        return $this->Doctors->store($request);
    }
    public function edit($id)
    {
        return $this->Doctors->edit($id);
    }
    public function show($id)
    {
        return $this->Doctors->Show($id);
    }
    public function update(Request $request)
    {
        return $this->Doctors->update($request);
    }
    public function destroy(request $request)
    {
        return $this->Doctors->destroy($request);
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        return $this->Doctors->update_password($request);
    }

    public function update_status(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|in:0,1',
        ]);
        return $this->Doctors->update_status($request);
    }
}