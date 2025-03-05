<?php

namespace App\Http\Controllers;

use App\Enum\Common\Gender;
use App\Enum\Students\StudentStatus;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get("q");
        $students = Student::with('course')->paginate(10);

        return view('students.index', [
            'students' => $students,
            "search" => $search
        ]);
    }

    public function create()
    {
        $listStudentStatus = StudentStatus::asArray();
        $gender = Gender::asArray();
        $courses = Course::get();

        return view(
            'students.create',
            [
                'status' => $listStudentStatus,
                'gender' => $gender,
                'courses' => $courses,
            ]
        );
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student)
    {
        $student = Student::with('course')->find($student->id);

        $listStudentStatus = StudentStatus::asArray();
        $gender = Gender::asArray();
        $courses = Course::get();

        return view('students.edit', [
            'student' => $student,
            'status' => $listStudentStatus,
            'gender' => $gender,
            'courses' => $courses,
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validated = $request->validated();
        $student->update($validated);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
