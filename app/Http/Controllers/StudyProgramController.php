<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    public function index()
    {
        $studyPrograms = StudyProgram::all();
        return view('studyPrograms.index', compact('studyPrograms'));
    }

    public function create()
    {
        return view('studyPrograms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        StudyProgram::create($request->all());

        return redirect()->route('admin.study-programs.index')->with('success', 'StudyProgram created successfully.');
    }

    public function edit(StudyProgram $studyProgram)
    {
        return view('studyPrograms.edit', compact('studyProgram'));
    }

    public function update(Request $request, StudyProgram $studyProgram)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
        ]);

        $studyProgram->update($request->all());

        return redirect()->route('admin.study-programs.index')->with('success', 'StudyProgram updated successfully.');
    }

    public function destroy(StudyProgram $studyProgram)
    {
        $studyProgram->delete();

        return redirect()->route('admin.study-programs.index')->with('success', 'StudyProgram deleted successfully.');
    }
}
