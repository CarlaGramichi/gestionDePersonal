<?php

namespace App\Http\Controllers;

use App\Career;
use App\Http\Requests\StoreStudent;
use App\Position;
use App\Student;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(
                Student::where([['is_deleted', '0'],])
                    ->with('career')
                    ->orderBy('name', 'ASC')
                    ->get()
            )->make(true);
        }

        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(StoreStudent $request)
    {

        Student::create($request->all());

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return Application|Factory|View
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(StoreStudent $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return JsonResponse
     */
    public function destroy(Student $student)
    {
        $student->update(['is_deleted' => '1', 'identification' => null]);

        return response()->json(['response' => true, 'message' => 'Alumno eliminada con éxito.']);
    }

    /**
     * @param Student $student
     * @return Application|Factory|View
     */
    public function assign(Student $student)
    {
        return view('students.assign', compact('student'));
    }

    /**
     * @param Student $student
     * @param Request $request
     * @return RedirectResponse
     */
    public function assignStore(Student $student, Request $request)
    {

        if ($career = Career::find($request->career_id)->first()) {
            $student->update(['career_id' => $career->id]);

            return redirect()->route('students.index')->with('success', 'Asignatura asignada con éxito.');
        }

        return redirect()->back()->withErrors(['Ocurrió un error al asignar la asignatura.']);
    }
}
