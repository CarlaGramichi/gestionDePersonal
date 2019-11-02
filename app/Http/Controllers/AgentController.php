<?php

namespace App\Http\Controllers;

use App\Agent;
use App\AgentContact;
use App\Http\Requests\AgentStoreRequest;
use App\Relationship;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $agents = Agent::where('name', 'like', "%{$request->search}%")
                ->orWhere('surname', 'like', "%{$request->search}%")
                ->orWhere('dni', 'like', "%{$request->search}%")
                ->limit(10)
                ->get()
                ->toArray();

            return $agents;
        }

        return view('agents.register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relationships = Relationship::where('is_deleted', '0')->pluck('name', 'id');


        return view('agents.register.create', compact('relationships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgentStoreRequest $request)
    {

        $agent = Agent::create([

            'name' => $request->agent['name'],
            'surname' => $request->agent['surname'],
            'dni' => $request->agent['dni'],
            'cuil' => $request->agent['cuil'],
            'born_date' => Carbon::createFromFormat('d/m/Y', $request->agent['born_date'])->format('Y-m-d'),
            'email' => $request->agent['email'],
            'phone' => $request->agent['phone'],
            'cellphone' => $request->agent['cellphone'],
            'address' => $request->agent['address'],
            'city' => $request->agent['city'],
            'state' => $request->agent['state'],
            'country' => $request->agent['country'],
        ]);

        AgentContact::create([
            'agent_id' => $agent->id,
            'relationship_id' => $request->contact['relationship_id'],
            'name' => $request->contact['name'],
            'surname' => $request->contact['surname'],
            'dni' => $request->contact['dni'],
            'born_date' => $request->contact['born_date'] ? Carbon::createFromFormat('d/m/Y', $request->contact['born_date'])->format('Y-m-d') : null,
            'email' => $request->contact['email'],
            'phone' => $request->contact['phone'],
            'cellphone' => $request->contact['cellphone'],
            'address' => $request->contact['address'],
            'city' => $request->contact['city'],
            'state' => $request->contact['state'],
            'country' => $request->contact['country'],
        ]);

        return view('agents.register.index', compact('agent'));



    }

    /**
     * Display the specified resource.
     *
     * @param \App\Agent $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Agent $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Agent $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Agent $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
