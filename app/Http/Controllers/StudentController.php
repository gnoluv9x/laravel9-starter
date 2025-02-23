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
        $student = new Student();
        $student->first_name = $request->get("first_name");
        $student->last_name = $request->get("last_name");
        $student->birthday = $request->get("birthday");
        $student->gender = $request->get("gender");
        // save to db
        $student->save();

        return redirect()->route('student.index');
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
        $student->first_name = $request->get("first_name");
        $student->last_name = $request->get("last_name");
        $student->birthday = $request->get("birthday");
        $student->gender = $request->get("gender");

        $student->save();

        return redirect()->route('student.index');
    }

    // public function destroy(string $id)
    // {
    //     Student::destroy($id);

    //     return redirect()->route('student.index');
    // }

    public function destroy(string $id)
    {
        Student::destroy($id);

        return redirect()->route('student.index');
    }
}
