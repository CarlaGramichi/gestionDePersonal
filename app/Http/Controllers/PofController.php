<?php

namespace App\Http\Controllers;

use App\Pof;
use Illuminate\Http\Request;

class PofController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pof  $pof
     * @return \Illuminate\Http\Response
     */
    public function show(Pof $pof)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pof  $pof
     * @return \Illuminate\Http\Response
     */
    public function edit(Pof $pof)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pof  $pof
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pof $pof)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pof  $pof
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pof $pof)
    {
        //
    }

    public function yearsIndex(Request $request){
        return view('pof.years.index');
    }

    public function yearsCreate(){
        return view('pof.years.create');
    }

    public function yearsStore(){

    }
}
