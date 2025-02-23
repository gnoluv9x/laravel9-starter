<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::get();

        return view("student", [
            "students" => $students
        ]);
    }

    public function create()
    {
        return view("student_create");
    }

    public function store(Request $request)
    {
        // 2 Way to do that

        // 1. Using object
        // $student = new Student();
        // $student->first_name = $request->get("first_name");
        // $student->last_name = $request->get("last_name");
        // $student->birthday = $request->get("birthday");
        // $student->gender = $request->get("gender");
        // $student->save();

        // 2. Using eloquent
        $student = new Student();
        $student->fill($request->all());
        $student->save();

        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = Student::find($id);

        return view('student_edit', [
            "student" => $student
        ]);
    }

    public function update(Request $request, string $id)
    {
        $student = new Student();

        // 2 Way to do that
        // 1. Using OOP
        // $student->first_name = $request->get("first_name");
        // $student->last_name = $request->get("last_name");
        // $student->birthday = $request->get("birthday");
        // $student->gender = $request->get("gender");
        // $student->save();

        // 2. Using eloquent
        $student->fill($request->all());

        return redirect()->route('students.index');
    }

    // public function destroy(string $id)
    // {
    //     Student::destroy($id);

    //     return redirect()->route('students.index');
    // }

    public function destroy(Student $student)
    {
        // Student::destroy($id);

        $student->delete();

        return redirect()->route('students.index');
    }
}
