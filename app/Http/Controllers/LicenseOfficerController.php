<?php

namespace App\Http\Controllers;

use App\LicenseOfficer;
use App\LicenseType;
use App\Position;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LicenseOfficerController extends Controller
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
                LicenseOfficer::where('is_deleted', '0')->get()
            )->make(true);
        }
        return view('license_codes.officers.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('license_codes.officers.create  ');

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

        $license_officer = LicenseOfficer::create($request->all());

        return redirect()->route('license_officer.index')->with("success", "Tipo de Funcionario fue creado correctamente. Id de la operación: <strong>{$license_officer->id}</strong>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LicenseOfficer  $licenceOfficer
     * @return \Illuminate\Http\Response
     */
    public function show(LicenseOfficer $licenceOfficer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LicenseOfficer  $licenceOfficer
     * @return \Illuminate\Http\Response
     */
    public function edit(LicenseOfficer $licenceOfficer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LicenseOfficer  $licenceOfficer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LicenseOfficer $licenceOfficer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LicenseOfficer  $licenceOfficer
     * @return \Illuminate\Http\Response
     */
    public function destroy(LicenseOfficer $licenceOfficer)
    {
        //
    }
}
