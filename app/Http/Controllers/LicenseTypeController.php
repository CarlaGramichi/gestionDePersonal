<?php

namespace App\Http\Controllers;


use App\LicenseType;
use App\Position;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LicenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                LicenseType::where('is_deleted', '0')->get()
            )->make(true);
        }
        return view('license_codes.types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('license_codes.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $type= LicenseType::create($request->all());

        return redirect()->route('license_codes_types.index')->with("success", "Cargo cargado correctamente. Id de la operación: <strong>{$type->id}</strong>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LicenseType  $licenceType
     * @return \Illuminate\Http\Response
     */
    public function show(LicenseType $licenceType)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LicenseType  $licenceType
     * @return \Illuminate\Http\Response
     */
    public function edit(LicenseType $licenseCodesType)//el nombre de la variable lo saco de las rutas//
    {

        //return($licenseCodesType);

        return view('license_codes.types.edit', compact('licenseCodesType'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LicenseType  $licenceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LicenseType $licenseCodesType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $licenseCodesType->update($request->all());
        return redirect()->route('license_codes_types.index')->with("success", "El tipo de licencia <strong>{$licenseCodesType->name}</strong> fue actualizado correctamente.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LicenseType  $licenceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LicenseType $licenseCodesType)
    {
        $licenseCodesType->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Tipo de Licencia eliminado con éxito.']);
    }
}
