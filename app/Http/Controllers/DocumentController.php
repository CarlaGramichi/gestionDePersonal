<?php

namespace App\Http\Controllers;

use App\Document;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class DocumentController extends Controller
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
            return Datatables::of(Document::where('is_deleted', '0')->orderBy('name')->get())->make(true);
        }

        return view('documents.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'auto_generate' => 'required|numeric|in:0,1'
        ]);

        $document = Document::create($request->all());

        return redirect()->route('documents.index')->with('success', "Documento cargado con éxito. Id de la operación {$document->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param Document $document
     * @return void
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $document
     * @return Response
     */
    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Document $document
     * @return Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'name'          => 'required',
            'auto_generate' => 'required|numeric|in:0,1'
        ]);

        $document->update($request->all());

        return redirect()->route('documents.index')->with('success', "Documento actualizado con éxito. Id de la operación {$document->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @return Response
     */
    public function destroy(Document $document)
    {
        $document->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Documento eliminado con éxito.']);
    }
}
