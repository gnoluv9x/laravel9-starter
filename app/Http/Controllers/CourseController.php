<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::get();

        return view("courses.index", [
            'courses' => $courses
        ]);
    }

    public function create()
    {
        return view("courses.create");
    }

    public function store(Request $request)
    {
        $course = new Course();
        $course->fill($request->all());
        $course->save();

        return redirect()->route("courses.index");
    }

    public function show(Course $course)
    {
        //
    }

    public function edit(Course $course)
    {
        return view("courses.edit", [
            'course' => $course
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        $course->save();

        return redirect()->route("courses.index");
    }

    public function destroy(Course $course)
    {
        Course::destroy($course->id);

        return redirect()->route("courses.index");
    }
}
