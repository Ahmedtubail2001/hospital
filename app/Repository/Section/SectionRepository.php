<?php

namespace App\Repository\Section;

use App\Interface\Section\SectionRepositoryInterface;
use App\Models\Section;
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
        // dd($request);
        $data = [
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
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
            'name_en' => $request->input('name_en'),
            'name_ar' => $request->input('name_ar'),
            'description_en' => $request->input('description_en'),
            'description_ar' => $request->input('description_ar'),
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

    public function show($id)
    {
        $doctors = Section::findOrFail($id)->doctors;
        $section = Section::findOrFail($id);
        return view('Dashboard.Sections.show_doctors', compact('doctors', 'section'));

    }
}