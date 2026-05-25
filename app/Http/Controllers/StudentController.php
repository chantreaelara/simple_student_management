<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function index(Request $request)
{
    $search = $request->input('search');

    $students = Student::latest()
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        })
        ->get();

    $totalStudents = Student::count();

    return view('students.index', compact('students', 'totalStudents'));
}

    public function create()
    {
        $totalStudents = Student::count();
        return view('students.create', compact('totalStudents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age'   => 'required|integer|min:1|max:150',
        ]);

        Student::create([
            'name'  => $request->name,
            'email' => $request->email,
            'age'   => $request->age,
        ]);

        return redirect()->route('students.index')
                         ->with('success', 'Student added successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully!');
    }

    public function edit(Student $student)
    {
        $totalStudents = Student::count();
        return view('students.edit', compact('student', 'totalStudents'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'age'   => 'required|integer|min:1|max:150',
        ]);

        $student->update([
            'name'  => $request->name,
            'email' => $request->email,
            'age'   => $request->age,
        ]);

        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully!');
    }
}