<?php

namespace App\Http\Controllers;

use App\Agent;
use App\AgentLicense;
use App\Position;
use App\PositionType;
use App\Status;
use Illuminate\Http\Request;

class AgentLicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */


    public function index(Request $request)
    {

        if ($request->ajax()) {

            $agents = Agent::where('name', 'like', "%{$request->search}%")
                ->orWhere('surname', 'like', "%{$request->search}%")
                ->orWhere('dni', 'like', "%{$request->search}%")
                ->limit(10)
                ->get();

            return $agents;
        }

        return view('agent_licenses.index', compact('agents'));
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
     * @param  \App\AgentLicense  $agentLicence
     * @return \Illuminate\Http\Response
     */
    public function show(AgentLicense $agentLicence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AgentLicense  $agentLicence
     * @return \Illuminate\Http\Response
     */
    public function edit(AgentLicense $agentLicence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AgentLicense  $agentLicence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgentLicense $agentLicence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AgentLicense  $agentLicence
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgentLicense $agentLicence)
    {
        //
    }
}
