<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        return $this->Doctors->store($request);
    }
    public function update(Request $request, string $id)
    {
        return $this->Doctors->update($request);
    }
    public function destroy(request $request)
    {
        return $this->Doctors->destroy($request);

    }
}