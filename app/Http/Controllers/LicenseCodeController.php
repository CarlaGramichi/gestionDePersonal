<?php

namespace App\Http\Controllers;

use App\LicenseCode;
use App\LicenseOfficer;
use App\LicenseType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LicenseCodeController extends Controller
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
                LicenseCode::where('is_deleted', '0')->with('licenseType','grantingOfficer','interveningOfficer')->get()
            )->make(true);
        }

        return view('license_codes.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $officers = LicenseOfficer::where('is_deleted', '0')->get()->pluck('name','id');
        $types = LicenseType::where('is_deleted', '0')->get()->pluck('name','id');

        return view('license_codes.create', compact('officers','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//
        $request->validate([
            'code' => 'required',
            'granting_officer_id' => 'required',
            'intervening_officer_id' => 'required',
            'license_type_id' => 'required',
            'license_type_id' => 'required',
            'kind_days' => 'required',
            'description' => 'required',
        ]);


        $license_codes= LicenseCode::create($request->all());

        return redirect()->route('license_codes.index')->with('success', "El código de licencia <strong>{$license_codes->code} - {$license_codes->description}</strong> fue cargado con éxito.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LicenseCode  $licenceCode
     * @return \Illuminate\Http\Response
     */
    public function show(LicenseCode $licenceCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LicenseCode  $licenceCode
     * @return \Illuminate\Http\Response
     */
    public function edit(LicenseCode $licenseCode)
    {
//        return($licenseCode);
        $types = LicenseType::where('is_deleted', '0')->get()->pluck('name','id');
        $officers = LicenseOfficer::where('is_deleted', '0')->get()->pluck('name','id');


        return view('license_codes.edit', compact('licenseCode', 'types', 'officers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LicenseCode  $licenceCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LicenseCode $licenseCode)
    {
        $request->validate([
            'code' => 'required',
            'granting_officer_id' => 'required',
            'intervening_officer_id' => 'required',
            'license_type_id' => 'required',
            'license_type_id' => 'required',
            'kind_days' => 'required',
            'description' => 'required',
        ]);

        $licenseCode->update($request->all());
        return redirect()->route('license_codes.index')->with("success", "El código de licencia <strong>{$licenseCode->code}</strong> fue actualizado correctamente.");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LicenseCode  $licenceCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(LicenseCode $licenseCode)
    {
        $licenseCode->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Código de licencia eliminado con éxito.']);
    }
}
