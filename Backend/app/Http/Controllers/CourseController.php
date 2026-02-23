<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return Course::with('students')->get();
    }

    public function store(Request $request)
    {
        return Course::create($request->only(['name', 'description']));
    }

    public function show($id)
    {
        return Course::with('students')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->only(['name', 'description']));
        return $course;
    }

    public function destroy($id)
    {
        Course::destroy($id);
        return response()->json(null, 204);
    }
}
