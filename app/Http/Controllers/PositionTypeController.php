<?php

namespace App\Http\Controllers;

use App\Position;
use App\PositionType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class PositionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Position $position
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function index(Position $position, Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                PositionType::where([['is_deleted', '0'], ['position_id', $position->id]])->with('position')->get()
            )->make(true);
        }

        return view('pof.positions.types.index', compact('position'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Position $position)
    {
        return view('pof.positions.types.create', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Position $position, Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'quota'  => 'required|numeric',
            'points' => 'required|numeric',
        ]);

        $request->request->add(['position_id' => $position->id]);

        $positionType = PositionType::create($request->all());

        return redirect()->route('pof.positions.{position}.types.index', ['position' => $position->id])->with("success", "Subcargo cargado correctamente. Id de la operación: <strong>{$positionType->id}</strong>");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Position $position
     * @param PositionType $type
     * @return Response
     */
    public function edit(Position $position, PositionType $type)
    {
        return view('pof.positions.types.edit', compact('position', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Position $position
     * @param PositionType $type
     * @param Request $request
     * @return Response
     */
    public function update(Position $position, PositionType $type, Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'quota'  => 'required|numeric',
            'points' => 'required|numeric',
        ]);

        $request->request->add(['position_id' => $position->id]);

        $type->update($request->all());

        return redirect()->route('pof.positions.{position}.types.index', ['position' => $position->id])->with("success", "Subcargo modificado correctamente. Id de la operación: <strong>{$type->id}</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Position $position
     * @param PositionType $type
     * @return Response
     */
    public function destroy(Position $position, PositionType $type)
    {
        $type->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Subcargo eliminado con éxito.']);
    }
}
