<?php

namespace App\Http\Controllers;

use App\Agent;
use App\AgentPositionType;
use App\AgentPositionTypeTransaction;
use App\AgentSubject;
use App\AgentSubjectSchedule;
use App\Career;
use App\Position;
use App\PositionType;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

        $agents = Agent::where('is_deleted', '0')->get();

        return view('agents.assign.agent', compact('position', 'positionType', 'agents'));
    }

    public function createProposal(Position $position, PositionType $positionType, Request $request)
    {
        if (str_is('docente', strtolower($position->name))) {
            $agent = Agent::where([['is_deleted', '0'], ['id', $request->agent_id]])->first()->makeHidden(['id', 'created_at', 'updated_at', 'is_deleted', 'status_id']);

            $years = Career::select('year')->where('is_deleted', '0')->groupBy('year')->get()->pluck('year', 'year');

            return view('agents.assign.create_proposal', compact('position', 'positionType', 'agent', 'years'));
        }

        $agentPositionType = AgentPositionType::create([
            'agent_id'         => $request->agent_id,
            'position_type_id' => $positionType->id
        ]);

        AgentPositionTypeTransaction::create([
            'agent_position_type_id' => $agentPositionType->id
        ]);

        return redirect()->route('agents.proposals.pending')->with('success', "Propuesta asignada con éxito. Id de la operación <strong>{$agentPositionType->id}</strong>");
    }

    public function setSubjectSchedule(Position $position, PositionType $positionType, Agent $agent, Request $request)
    {
        $subject = Subject::where([['is_deleted', '0'], ['id', $request->subject_id]])->with('regimen', 'course', 'division')->first();

        $agent = $agent->makeHidden(['id', 'created_at', 'updated_at', 'is_deleted', 'status_id']);

        return view('agents.assign.subject_schedule', compact('position', 'positionType', 'agent', 'subject'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Agent $agent
     * @return Response
     */
    public function index()
    {
        return view('agents.assign.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Position $position
     * @param PositionType $positionType
     * @param Agent $agent
     * @param Request $request
     * @return void
     */
    public function store(Position $position, PositionType $positionType, Agent $agent, Subject $subject, Request $request)
    {
        $agentPositionType = AgentPositionType::create([
            'agent_id'         => $agent->id,
            'position_type_id' => $positionType->id
        ]);

        AgentPositionTypeTransaction::create([
            'agent_position_type_id' => $agentPositionType->id
        ]);

        $agentSubject = AgentSubject::create([
            'agent_id'   => $agent->id,
            'subject_id' => $subject->id
        ]);

        foreach ($request->day as $index => $day) {
            AgentSubjectSchedule::create([
                'agent_subject_id' => $agentSubject->id,
                'day'              => $day,
                'start_time'       => $request->start_time[$index],
                'end_time'         => $request->end_time[$index],
            ]);
        }


        return redirect()->route('agents.proposals.pending')->with('success', "Propuesta asignada con éxito. Id de la operación <strong>{$agentSubject->id}</strong>");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
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
