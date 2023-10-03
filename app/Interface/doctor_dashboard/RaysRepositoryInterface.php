<?php

namespace App\Interface\doctor_dashboard;

interface RaysRepositoryInterface
{
    public function store($request);

    public function update($request, $id);

    public function destroy($id);
}