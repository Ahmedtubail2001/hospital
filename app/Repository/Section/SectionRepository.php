<?php

namespace App\Repository\Section;

use App\Interface\Section\SectionRepositoryInterface;
use App\Models\Models\Section;
use App\Models\Section as ModelsSection;

class SectionRepository implements SectionRepositoryInterface
{

    public function index()
    {
        $sections = ModelsSection::all();

        return view('Dashboard.Sections.index', compact('sections'));
    }
    public function store($request)
    {
        $data = [
            'en' => ['name' => $request->name]
        ];
        $section = ModelsSection::create($data);
        if ($section) {
            session()->flash('add');
        } else {
            session()->flash('error');
        }
        return redirect()->route('Sections.index');
    }

    public function update($request)
    {
        $section = ModelsSection::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
        ]);
        session()->flash('edit');
        return redirect()->route('Sections.index');
    }

    public function destroy($request)
    {
        $section = ModelsSection::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Sections.index');
    }
}