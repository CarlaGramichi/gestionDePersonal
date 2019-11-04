<?php

namespace App\Http\Controllers;

use App\Career;
use App\CareerCourse;
use App\CareerCourseDivision;
use App\Http\Requests\SubjectsUpdateRequest;
use App\Regimen;
use App\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Career $career
     * @param CareerCourse $course
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function index(Career $career, CareerCourse $course, Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                Subject::where(
                    [
                        ['is_deleted', '0'],
                        ['career_course_id', $course->id],
                    ])
                    ->when(request('career_course_division_id'), function ($query, $career_course_division_id) {
                        if ($career_course_division_id) {
                            return $query->where('career_course_division_id', $career_course_division_id);
                        }
                    })
                    ->with(['course', 'division', 'regimen'])
                    ->orderBy('name')
                    ->get()
            )->make(true);
        }

        return view('pof.careers.courses.subjects.index', compact('career', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Career $career
     * @param CareerCourse $course
     * @return Response
     */
    public function create(Career $career, CareerCourse $course)
    {
        $regimens = Regimen::where('is_deleted', '0')->get()->pluck('name', 'id');

        return view('pof.careers.courses.subjects.create', compact('career', 'course', 'regimens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Career $career
     * @param CareerCourse $course
     * @param Request $request
     * @return Response
     */
    public function store(Career $career, CareerCourse $course, Request $request)
    {
        $request->validate([
            'career_course_division_id' => 'exists:career_course_divisions,id',
            'regimen_id'                => 'exists:regimens,id',
            'name'                      => 'required',
            'hours'                     => 'required|numeric',
        ]);

        $request->request->add(['career_course_id' => $course->id]);

        $subject = Subject::create($request->all());

        return redirect("pof/careers/{$career->id}/courses/{$course->id}/subjects")->with('success', "Asignatura <strong>{$subject->name}</strong> cargada con éxito. Id de operación <strong>{$subject->id}</strong>");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Career $career
     * @param CareerCourse $course
     * @param Subject $subject
     * @return void
     */
    public function edit(Career $career, CareerCourse $course, Subject $subject)
    {
        $regimens = Regimen::where('is_deleted', '0')->get()->pluck('name', 'id');

        return view('pof.careers.courses.subjects.edit', compact('career', 'course', 'subject', 'regimens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Career $career
     * @param CareerCourse $course
     * @param Subject $subject
     * @param Request $request
     * @return void
     */
    public function update(Career $career, CareerCourse $course, Subject $subject, Request $request)
    {
        $request->validate([
            'career_course_division_id' => 'exists:career_course_divisions,id',
            'regimen_id'                => 'exists:regimens,id',
            'name'                      => 'required',
            'hours'                     => 'required|numeric'
            ]);

        $request->request->add(['career_course_id' => $course->id]);

        $subject->update($request->all());

        return redirect("pof/careers/{$career->id}/courses/{$course->id}/subjects")->with('success', "Asignatura <strong>{$subject->name}</strong> modificada con éxito. Id de operación <strong>{$subject->id}</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Career $career
     * @param CareerCourse $course
     * @param Subject $subject
     * @return Response
     */
    public function destroy(Career $career, CareerCourse $course, Subject $subject)
    {
        $subject->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Asignatura eliminada con éxito.']);
    }
}
