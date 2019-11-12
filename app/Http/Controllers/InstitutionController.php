<?php

namespace App\Http\Controllers;

use App\Institution;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                Institution::where([['is_deleted', '0'],])
                    ->orderBy('name', 'ASC')
                    ->get()
            )->make(true);
        }

        return view('institutions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('institutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cue'        => 'required',
            'name'       => 'required',
            'department' => 'required',
            'city'       => 'required',
            'state'      => 'required',
            'country'    => 'required',
        ]);

        $institution = Institution::create($request->all());

        return redirect()->route('institutions.index')->with('success', "Institución <strong>{$institution->name}</strong> cargada con éxito. Id de operación <strong>{$institution->id}</strong>");
    }

    /**
     * Display the specified resource.
     *
     * @param Institution $institution
     * @param Request $request
     * @return Response
     */
    public function show(Institution $institution, Request $request)
    {
        if ($request->ajax()) {
            return response()->json($institution);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Institution $institution
     * @return Response
     */
    public function edit(Institution $institution)
    {
        return view('institutions.edit', compact('institution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Institution $institution
     * @return Response
     */
    public function update(Request $request, Institution $institution)
    {
        $request->validate([
            'cue'        => 'required',
            'name'       => 'required',
            'department' => 'required',
            'city'       => 'required',
            'state'      => 'required',
            'country'    => 'required',
        ]);

        $institution->update($request->all());

        return redirect()->route('institutions.index')->with('success', "Institución <strong>{$institution->name}</strong> actualizada con éxito. Id de operación <strong>{$institution->id}</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Institution $institution
     * @return Response
     */
    public function destroy(Institution $institution)
    {
        $institution->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Institución eliminada con éxito.']);
    }
}
