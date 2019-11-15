<?php

namespace App\Http\Controllers;

use App\Career;
use App\CareerCourse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class CareerCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws \Exception
     */
    public function index(Career $career, Request $request)
    {

        if ($request->ajax()) {
            $courses = CareerCourse::where([['is_deleted', '0'], ['career_id', $career->id]]);
            if ($request->table == 'true') {
                return Datatables::of($courses->with(['career'])->orderBy('name')->get())->make(true);
            }

            return $courses->get()->pluck('name', 'id');
        }

        return view("pof.careers.courses.index", compact('career'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Career $career)
    {
        return view('pof.careers.courses.create', compact('career'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Career $career, Request $request)
    {
        $request->validate([
            'career_id' => 'exists:careers,id',
            'name'      => 'required',
        ]);

        $request->request->add(['career_id' => $career->id]);

        $course = CareerCourse::create($request->all());

        return redirect("pof/careers/{$career->id}/courses")->with('success', "Curso <strong>{$course->name}</strong> cargado con éxito. Id de operación <strong>{$course->id}</strong>");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Career $career
     * @param CareerCourse $course
     * @return Response
     */
    public function edit(Career $career, CareerCourse $course)
    {
        return view('pof.careers.courses.edit', compact('career', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Career $career
     * @param CareerCourse $course
     * @param Request $request
     * @return Response
     */
    public function update(Career $career, CareerCourse $course, Request $request)
    {
        $request->validate([
            'career_id' => 'exists:careers,id',
            'name'      => 'required',
        ]);

        $request->request->add(['career_id' => $career->id]);

        $course->update($request->all());

        return redirect("pof/careers/{$career->id}/courses")->with('success', "Curso <strong>{$course->name}</strong> modificado con éxito. Id de operación <strong>{$course->id}</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CareerCourse $course
     * @return Response
     */
    public function destroy(Career $career, CareerCourse $course)
    {
        $course->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Curso eliminado con éxito.']);
    }
}
