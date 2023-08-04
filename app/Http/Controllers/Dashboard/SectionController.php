<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interface\Section\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $Sections;

    public function __construct(SectionRepositoryInterface $Sections)
    {
        $this->Sections = $Sections;
    }

    public function index()
    {
        //
        return $this->Sections->index();
    }

    public function store(Request $request)
    {
        //
        return $this->Sections->store($request);
    }

    public function update(Request $request, string $id)
    {
        //
        return $this->Sections->update($request);
    }

    public function destroy(request $request)
    {
        //
        return $this->Sections->destroy($request);

    }
}