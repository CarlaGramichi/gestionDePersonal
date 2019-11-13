<?php

namespace App\Http\Controllers;

use App\Agent;
use App\AgentPositionType;
use App\Career;
use App\Position;
use App\PositionType;
use Illuminate\Http\Request;

class AgentAssignController extends Controller
{

    public function selectPosition()
    {
        $positions = Position::where('is_deleted', '0')->get()->pluck('name', 'id');

        return view('agents.assign.positions', compact('positions'));
    }

    public function selectPositionTypes(Request $request)
    {
        $position = Position::where([['is_deleted', '0'], ['id', $request->position_id]])->first();

        $positionTypes = PositionType::where(
            [
                ['is_deleted', '0'],
                ['position_id', $request->position_id]
            ])
            ->get()
            ->pluck('name', 'id');

        return view('agents.assign.position_types', compact('position', 'positionTypes'));
    }

    public function selectAgent(Position $position, Request $request)
    {
        $positionType = PositionType::where([['is_deleted', '0'], ['id', $request->position_type_id]])->first();

        $agents = Agent::where('is_deleted', '0')->get()->pluck('name', 'id');

        return view('agents.assign.agent', compact('position', 'positionType', 'agents'));
    }

    public function createProposal(Position $position, PositionType $positionType, Request $request)
    {
        if (str_is('docente', strtolower($position->name))) {
            $agent = Agent::where([['is_deleted', '0'], ['id', $request->agent_id]])->first();

            $years = Career::select('year')->where('is_deleted', '0')->groupBy('year')->get()->pluck('year','year');

            return view('agents.assign.create_proposal', compact('position', 'positionType', 'agent', 'years'));
        }

        $agentPositionType = AgentPositionType::create([
            'agent_id'         => $request->agent_id,
            'position_type_id' => $positionType->id
        ]);

        return redirect()->route('agents.proposals.pending')->with('success', "Propuesta asignada con éxito. Id de la operación <strong>{$agentPositionType->id}</strong>");
    }

    /**
     * Display a listing of the resource.
     *
     * @param Agent $agent
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agents.assign.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function positions(Agent $agent)
    {
        $positions = Position::where('is_deleted', '0')->get()->pluck('name', 'id');

        return view('agents.assign.positions', compact('agent', 'positions'));
    }
}
