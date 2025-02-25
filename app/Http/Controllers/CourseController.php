<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\DestroyCourseRequest;
use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get("q");
        $courses = Course::where("name", "like", "%" . $search . "%")->paginate(10);
        $courses->appends((['q' => $search]));

        return view("courses.index", [
            'courses' => $courses,
            'search' => $search
        ]);
    }

    public function create()
    {
        return view("courses.create");
    }

    public function store(StoreCourseRequest $request)
    {
        // $course = new Course();
        // $course->fill($request->all());
        // $course->save();

        // Course::create($request->except('_token'));

        Course::create($request->validated());

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

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());
        $course->save();

        return redirect()->route("courses.index");
    }

    public function destroy(DestroyCourseRequest $requets, $course)
    {
        dd($course);
        exit();
        Course::destroy($course->id);

        return redirect()->route("courses.index");
    }
}
