<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();

        return view('pages.school', compact('schools'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        School::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('school.index');
    }

    public function edit($id)
    {
        $school = School::findOrFail($id);

        return view('pages.edit', compact('school'));
    }

    public function update(Request $request, $id)
    {
        $school = School::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $school->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('school.index');
    }

    public function destroy($id)
    {
        $school = School::findOrFail($id);

        $school->delete();

        return redirect()->route('school.index');
    }
}
