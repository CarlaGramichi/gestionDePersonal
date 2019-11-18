<?php

namespace App\Http\Controllers;

use App\AgentPositionType;
use App\AgentPositionTypeTransaction;
use App\AgentPositionTypeTransactionStatuses;
use App\AgentProposal;
use App\PositionDocument;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AgentProposalController extends Controller
{

    public function pending(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                AgentPositionTypeTransaction::with('agentPositionType', 'statuses')->orderByDesc('created_at')->get()
            )->make(true);
        }

        return view('agents.proposals.pending');
    }

    public function documents(AgentPositionTypeTransaction $agentPositionTypeTransaction)
    {
        $documents = PositionDocument::where('position_id', $agentPositionTypeTransaction->agentPositionType->positionType->position->id)->with('document')->get();

        return view('agents.proposals.documents', compact('documents', 'agentPositionTypeTransaction'));
    }

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
     * @param \App\AgentProposal $agentProposal
     * @return \Illuminate\Http\Response
     */
    public function show(AgentProposal $agentProposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\AgentProposal $agentProposal
     * @return \Illuminate\Http\Response
     */
    public function edit(AgentProposal $agentProposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\AgentProposal $agentProposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgentProposal $agentProposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\AgentProposal $agentProposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgentProposal $agentProposal)
    {
        //
    }
}
