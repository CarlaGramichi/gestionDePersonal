<?php

namespace App\Http\Controllers;

use App\Career;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class PofCareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                Career::where(
                    [
                        ['is_deleted', '0'],
                        ['year', $request->year]
                    ])
                    ->orderBy('year', 'DESC')
                    ->get()
            )->make(true);
        }

        $years = Career::select('year')->where('is_deleted', '0')->groupBy('year')->get()->pluck('year');

        return view('pof.careers.index', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pof.careers.create');
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
            'year' => 'required|numeric',
            'name' => 'required',
        ]);

        $career = Career::create($request->all());

        return redirect()->route('pof.careers.index')->with('success', "Carrera <strong>{$career->year} - {$career->name}</strong> cargada con éxito. Id de operación <strong>{$career->id}</strong>");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Career $career
     * @return Response
     */
    public function edit(Career $career)
    {
        return view('pof.careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Career $career
     * @return Response
     */
    public function update(Request $request, Career $career)
    {
        $career->update($request->all());

        return redirect()->route('pof.careers.index')->with('success', "Carrera <strong>{$career->year} - {$career->name}</strong> editada con éxito. Id de operación <strong>{$career->id}</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Career $career
     * @return Response
     */
    public function destroy(Career $career)
    {
        $career->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Carrera eliminada con éxito.']);
    }
}
