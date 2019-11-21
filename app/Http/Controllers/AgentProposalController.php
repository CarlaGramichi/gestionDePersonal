<?php

namespace App\Http\Controllers;

use App\AgentPositionType;
use App\AgentPositionTypeTransaction;
use App\AgentPositionTypeTransactionDocument;
use App\AgentPositionTypeTransactionStatus;
use App\AgentProposal;
use App\PositionDocument;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Zip;
use File;
use ZipArchive;

class AgentProposalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                AgentPositionTypeTransaction::with('agentPositionType', 'statuses')->orderByDesc('created_at')->get()
            )->make(true);
        }

        return view('agents.proposals.pending');
    }

    public function storeFile(AgentPositionTypeTransaction $agentPositionTypeTransaction, Request $request)
    {
        $request->validate([
            'tmp_file' => 'required'
        ]);

        $path = Storage::disk('public_uploads')->put('agents/proposals/documents', $request->file('tmp_file'));

        $agentPositionTypeTransaction->update([
            'file' => $path
        ]);

        AgentPositionTypeTransactionStatus::create([
            'agent_position_type_transaction_id' => $agentPositionTypeTransaction->id,
            'transaction_status_id'              => 3,
        ]);


        return redirect()->back()->with('success', 'Expediente cargado con éxito.');
    }

    public function setProcedureNumber(AgentPositionTypeTransaction $agentPositionTypeTransaction, Request $request){
        $request->validate([
            'procedure_number' => 'required'
        ]);

        $agentPositionTypeTransaction->update([
            'procedure_number'=>$request->procedure_number,
        ]);

        AgentPositionTypeTransactionStatus::create([
            'agent_position_type_transaction_id' => $agentPositionTypeTransaction->id,
            'transaction_status_id'              => 4,
        ]);

        return redirect()->back()->with('success', 'Nº de expediente cargado con éxito.');
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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param AgentProposal $agentProposal
     * @return Response
     */
    public function show(AgentProposal $agentProposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AgentProposal $agentProposal
     * @return Response
     */
    public function edit(AgentProposal $agentProposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AgentProposal $agentProposal
     * @return Response
     */
    public function update(Request $request, AgentProposal $agentProposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AgentProposal $agentProposal
     * @return Response
     */
    public function destroy(AgentProposal $agentProposal)
    {
        //
    }
}
