<?php

namespace App\Http\Controllers;

use App\Position;
use App\PositionType;
use App\PositionTypeHour;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class PositionTypeHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                PositionTypeHour::where('is_deleted', '0')->with('position_type')->get()
            )->make(true);
        }

        return view("position_type_hours.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $years = Position::select('year')->where('is_deleted', '0')->groupBy('year')->get()->pluck('year', 'year');

        if (in_array(now()->year, $years->toArray())) {
            $year = now()->year;
        } else {
            $year = array_values($years->toArray())[0];
        }

        $positions = Position::where([['is_deleted', '0'], ['year', $year]])->get()->pluck('name', 'id')->prepend('Seleccionar', '');

        return view('position_type_hours.create', compact('years', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'position_type_id' => 'required|exists:position_types,id',
            'hours'            => 'required|numeric',
        ]);

        if ($file = $request->file('tmp_file')) {
            $path = Storage::disk('public_uploads')->put('position_types_hours/docs/pdf', $file);

            $request->request->add(['file' => $path]);
        }

        $positionTypeHour = PositionTypeHour::create($request->except(['tmp_file']));

        return redirect()->route('position_type_hours.index')->with('success', "Horas cargadas con éxito. Id de operación: <strong>{$positionTypeHour->id}</strong>");
    }

    /**
     * Display the specified resource.
     *
     * @param PositionTypeHour $positionTypeHour
     * @return Response
     */
    public function show(PositionTypeHour $positionTypeHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PositionTypeHour $positionTypeHour
     * @return Factory|View
     */
    public function edit(PositionTypeHour $positionTypeHour)
    {
        $years = Position::select('year')->where('is_deleted', '0')->groupBy('year')->get()->pluck('year', 'year');

        if (in_array(now()->year, $years->toArray())) {
            $year = now()->year;
        } else {
            $year = array_values($years->toArray())[0];
        }

        $positions = Position::where([['is_deleted', '0'], ['year', $year]])->get()->pluck('name', 'id')->prepend('Seleccionar', '');

        $position_types = PositionType::where('position_id', $positionTypeHour->position_type->position->id)->get()->pluck('name', 'id');

        $positionTypeHour->load('position_type');

        return view('position_type_hours.edit', compact('positionTypeHour', 'years', 'positions', 'position_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PositionTypeHour $positionTypeHour
     * @return RedirectResponse
     */
    public function update(Request $request, PositionTypeHour $positionTypeHour)
    {
        $request->validate([
            'position_type_id' => 'required|exists:position_types,id',
            'hours'            => 'required|numeric',
        ]);

        if ($file = $request->file('tmp_file')) {
            $path = Storage::disk('public_uploads')->put('position_types_hours/docs/pdf', $file);

            $request->request->add(['file' => $path]);
        }

        $positionTypeHour->update($request->except(['tmp_file']));

        return redirect()->route('position_type_hours.index')->with('success', "Horas modificadas con éxito. Id de operación: <strong>{$positionTypeHour->id}</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PositionTypeHour $positionTypeHour
     * @return JsonResponse
     */
    public function destroy(PositionTypeHour $positionTypeHour)
    {
        $positionTypeHour->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Horas eliminadas con éxito.']);
    }
}
