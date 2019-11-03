<?php

namespace App\Http\Controllers;

use App\Career;
use App\CareerCourse;
use App\CareerCourseDivision;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class CareerCourseDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws \Exception
     */
    public function index(Career $career, CareerCourse $course, Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                CareerCourseDivision::where(
                    [
                        ['is_deleted', '0'],
                        ['career_course_id', $course->id]
                    ])
                    ->with(['course'])
                    ->orderBy('name')
                    ->get()
            )->make(true);
        }

        return view('pof.careers.courses.divisions.index', compact('career', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Career $career, CareerCourse $course)
    {
        return view('pof.careers.courses.divisions.create', compact('career', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Career $career, CareerCourse $course, Request $request)
    {
        $request->validate([
            'career_course_id' => 'exists:careers_courses,id',
            'name'             => 'required',
        ]);

        $request->request->add(['career_course_id' => $course->id]);

        $division = CareerCourseDivision::create($request->all());

        return redirect("pof/careers/{$career->id}/courses/{$course->id}/divisions")->with('success', "División <strong>{$division->name}</strong> cargada con éxito. Id de operación <strong>{$division->id}</strong>");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Career $career
     * @param CareerCourse $course
     * @param CareerCourseDivision $division
     * @return Response
     */
    public function edit(Career $career, CareerCourse $course, CareerCourseDivision $division)
    {
        return view('pof.careers.courses.divisions.edit', compact('career', 'course', 'division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Career $career
     * @param CareerCourse $course
     * @param CareerCourseDivision $division
     * @param Request $request
     * @return Response
     */
    public function update(Career $career, CareerCourse $course, CareerCourseDivision $division, Request $request)
    {
        $request->request->add(['career_course_id' => $course->id]);

        $division->update($request->all());

        return redirect("pof/careers/{$career->id}/courses/{$course->id}/divisions")->with('success', "Curso <strong>{$division->name}</strong> modificado con éxito. Id de operación <strong>{$division->id}</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Career $career
     * @param CareerCourse $course
     * @param CareerCourseDivision $division
     * @return Response
     */
    public function destroy(Career $career, CareerCourse $course, CareerCourseDivision $division)
    {
        $division->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'División eliminada con éxito.']);
    }
}
