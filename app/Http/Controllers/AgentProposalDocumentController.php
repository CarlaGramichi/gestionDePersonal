<?php

namespace App\Http\Controllers;

use App\AgentPositionTypeTransaction;
use App\AgentPositionTypeTransactionDocument;
use App\AgentPositionTypeTransactionStatus;
use App\PositionDocument;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
//use Zip;
use ZanySoft\Zip\Zip;

class AgentProposalDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AgentPositionTypeTransaction $agentPositionTypeTransaction
     * @return Factory|\Illuminate\View\View
     */
    public function index(AgentPositionTypeTransaction $agentPositionTypeTransaction)
    {
        $documents = PositionDocument::with('document')
            ->where('position_id', $agentPositionTypeTransaction->agentPositionType->positionType->position->id)
            ->with([
                'uploadedDocument' => function ($q) use ($agentPositionTypeTransaction) {
                    $q->where('agent_position_type_transaction_id', $agentPositionTypeTransaction->id)->oldest();
                }])
            ->get();

        $uploaded_documents = 0;
        foreach ($documents as $document) {
            if ($document->uploadedDocument) {
                $uploaded_documents++;
            }
        }

        return view('agents.proposals.documents', compact('documents', 'agentPositionTypeTransaction', 'uploaded_documents'));
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
     * @param AgentPositionTypeTransaction $agentPositionTypeTransaction
     * @param Request $request
     * @return void
     */
    public function store(AgentPositionTypeTransaction $agentPositionTypeTransaction, Request $request)
    {
        $request->validate([
            'tmp_file' => 'required'
        ]);

        $path = Storage::disk('public_uploads')->put('agents/proposals/documents', $request->file('tmp_file'));

        $request->request->add(['file' => $path]);
        $request->request->add(['agent_position_type_transaction_id' => $agentPositionTypeTransaction->id]);

        $agentPositionTypeTransactionDocument = AgentPositionTypeTransactionDocument::create($request->except(['tmp_file']));

        return redirect()->back()->with('success', "Documento cargado correctamente. Id de la operación: <strong>{$agentPositionTypeTransactionDocument->id}</strong>");
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
    public function update(AgentPositionTypeTransaction $agentPositionTypeTransaction)
    {
        AgentPositionTypeTransactionStatus::create([
            'agent_position_type_transaction_id' => $agentPositionTypeTransaction->id,
            'transaction_status_id'              => 2
        ]);

        return redirect()->route('agents.proposals.pending');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AgentPositionTypeTransaction $agentPositionTypeTransaction
     * @param AgentPositionTypeTransactionDocument $document
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function destroy(AgentPositionTypeTransaction $agentPositionTypeTransaction, AgentPositionTypeTransactionDocument $document, Request $request)
    {
        $document->delete();

        return redirect()->back()->with('success', 'Documento eliminado con éxito');
    }

    /**
     * @param AgentPositionTypeTransaction $agentPositionTypeTransaction
     * @return BinaryFileResponse
     */
    public function downloadAll(AgentPositionTypeTransaction $agentPositionTypeTransaction)
    {
        $file_path = 'uploads/agents/proposals/zip/documents.zip';

        $file_name = date('d_m_Y') . "_documentos_" . Str::slug($agentPositionTypeTransaction->agentPositionType->agent->name, '_') . ".zip";

        File::put($file_path, '');

        $zip = Zip::open($file_path);

        $documents = AgentPositionTypeTransactionDocument::where('agent_position_type_transaction_id', $agentPositionTypeTransaction->id)->get();

        foreach ($documents as $document) {
            $zip->add(public_path() . "/uploads/" . $document->file);
        }

        $zip->close();

        return response()->download($file_path, $file_name);
    }
}
