<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSingleServiceRequest;
use App\Interface\Services\SingleServiceRepositoryInterface;
use Illuminate\Http\Request;

class SingleServiceController extends Controller
{
    private $SingleServices;

    public function __construct(SingleServiceRepositoryInterface $SingleServices)
    {
        $this->SingleServices = $SingleServices;
    }
    public function index()
    {
        //
        return $this->SingleServices->index();

    }

    public function create()
    {
        //
    }

    public function store(StoreSingleServiceRequest $request)
    {
        //
        return $this->SingleServices->store($request);

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request)
    {
        //
        return $this->SingleServices->update($request);

    }

    public function destroy(Request $request)
    {
        //
        return $this->SingleServices->destroy($request);

    }
}