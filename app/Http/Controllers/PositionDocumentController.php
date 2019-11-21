<?php

namespace App\Http\Controllers;

use App\Document;
use App\Position;
use App\PositionDocument;
use App\PositionType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class PositionDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Position $position
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function index(Position $position, Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                $position->documents
            )->make(true);
        }

        return view('pof.positions.documents.index', compact('position'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Position $position
     * @return Response
     */
    public function create(Position $position)
    {
        $documents = Document::where('is_deleted', '0')->get()->pluck('name', 'id');

        return view('pof.positions.documents.create', compact('position', 'documents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Position $position
     * @param Request $request
     * @return void
     */
    public function store(Position $position, Request $request)
    {
        $request->validate([
            'document_id' => 'required|numeric|exists:documents,id'
        ]);

        $positionDocument = PositionDocument::create([
            'position_id' => $position->id,
            'document_id' => $request->document_id
        ]);

        return redirect()->route('pof.positions.{position}.documents.index', ['position' => $position->id])->with("success", "Documento cargado correctamente. Id de la operación: <strong>{$positionDocument->id}</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Position $position
     * @param PositionDocument $document
     * @return Response
     * @throws Exception
     */
    public function destroy(Position $position, PositionDocument $document)
    {
        $document->delete();

        return response()->json(['response' => true, 'message' => 'Documento eliminado con éxito.']);
    }
}
