<?php

namespace App\Http\Controllers;

use App\AgentPositionType;
use App\Position;
use App\PositionType;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class PositionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Position $position
     * @param Request $request
     * @return Factory|View
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
     * @return Factory|View
     */
    public function create(Position $position)
    {
        return view('pof.positions.types.create', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Position $position
     * @param Request $request
     * @return RedirectResponse
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
     * Display the specified resource.
     *
     * @param Position $position
     * @param PositionType $type
     * @return array
     */
    public function show(Position $position, PositionType $type, Request $request)
    {
        if ($request->ajax()) {
            $used = AgentPositionType::where('position_type_id', $type->id)->count();
            return [
                'position_type' => $type->makeHidden(['id', 'created_at', 'is_deleted', 'updated_at']),
                'used'          => $used,
                'available'     => $type->quota - $used
            ];
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Position $position
     * @param PositionType $type
     * @return Factory|View
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
     * @return RedirectResponse
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
     * @return JsonResponse
     */
    public function destroy(Position $position, PositionType $type)
    {
        $type->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Subcargo eliminado con éxito.']);
    }
}
