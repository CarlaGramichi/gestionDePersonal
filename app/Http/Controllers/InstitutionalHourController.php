<?php

namespace App\Http\Controllers;

use App\InstitutionalHour;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class InstitutionalHourController extends Controller
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
                InstitutionalHour::where('is_deleted', '0')->orderBy('year','DESC')->get()
            )->make(true);
        }

        return view("institutional_hours.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('institutional_hours.create');
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
            'name'  => 'required',
            'year'  => 'required|numeric',
            'hours' => 'required|numeric',
        ]);

        if ($file = $request->file('tmp_file')) {
            $path = Storage::disk('public_uploads')->put('institutional_hours/docs/pdf', $file);

            $request->request->add(['file' => $path]);
        }

        $institutionalHour = InstitutionalHour::create($request->except(['tmp_file']));

        return redirect()->route('institutional_hours.index')->with('success', "Horas institucionales cargadas con éxito. Id de operación: <strong>{$institutionalHour->id}</strong>");
    }

    /**
     * Display the specified resource.
     *
     * @param InstitutionalHour $institutionalHour
     * @return Response
     */
    public function show(InstitutionalHour $institutionalHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param InstitutionalHour $institutionalHour
     * @return Factory|View
     */
    public function edit(InstitutionalHour $institutionalHour)
    {
        return view('institutional_hours.edit', compact('institutionalHour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param InstitutionalHour $institutionalHour
     * @return RedirectResponse
     */
    public function update(Request $request, InstitutionalHour $institutionalHour)
    {
        $request->validate([
            'name'  => 'required',
            'year'  => 'required|numeric',
            'hours' => 'required|numeric',
        ]);

        if ($file = $request->file('tmp_file')) {
            $path = Storage::disk('public_uploads')->put('institutional_hours/docs/pdf', $file);

            $request->request->add(['file' => $path]);
        }

        $institutionalHour->update($request->except(['tmp_file']));

        return redirect()->route('institutional_hours.index')->with('success', "Horas institucionales actualizadas con éxito. Id de operación: <strong>{$institutionalHour->id}</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param InstitutionalHour $institutionalHour
     * @return JsonResponse
     */
    public function destroy(InstitutionalHour $institutionalHour)
    {
        $institutionalHour->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Horas institucionales eliminadas con éxito.']);
    }
}
