<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                Position::where([['is_deleted', '0'], ['year', $request->year]])->get()
            )->make(true);
        }

        $years = Position::select('year')->where('is_deleted', '0')->groupBy('year')->get()->pluck('year');

        return view('pof.positions.index', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pof.positions.create');
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

        $position = Position::create($request->all());

        return redirect()->route('pof.positions.index')->with("success", "Cargo cargado correctamente. Id de la operación: <strong>{$position->id}</strong>");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Position $position
     * @return Response
     */
    public function edit(Position $position)
    {
        return view('pof.positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Position $position
     * @return Response
     */
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'year' => 'required|numeric',
            'name' => 'required',
        ]);

        $position->update($request->all());

        return redirect()->route('pof.positions.index')->with("success", "Cargo {$position->name} actualizado correctamente. Id de la operación: <strong>{$position->id}</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Position $position
     * @return Response
     */
    public function destroy(Position $position)
    {
        $position->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Cargo eliminado con éxito.']);
    }

    public function availability(Position $position)
    {


    }
}
