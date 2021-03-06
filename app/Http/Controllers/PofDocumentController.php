<?php

namespace App\Http\Controllers;

use App\Http\Requests\PofDocumentStoreRequest;
use App\Institution;
use App\Level;
use App\Pof;
use App\PofDocument;
use App\Shift;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PofDocumentController extends Controller
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
                Pof::where('is_deleted', '0')->with(['level', 'shift'])->orderBy('year', 'DESC')
            )->make(true);
        }

        return view('pof.upload.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $levels = Level::where('is_deleted', '0')->pluck('name', 'id');
        $shifts = Shift::where('is_deleted', '0')->pluck('name', 'id');
        $institutions = Institution::where('is_deleted', '0')->pluck('name', 'id');

        return view('pof.upload.create', compact('levels', 'shifts','institutions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PofDocumentStoreRequest $request
     * @return Response
     */
    public function store(PofDocumentStoreRequest $request)
    {
        if ($file = $request->file('tmp_file')) {
            $path = Storage::disk('public_uploads')->put('pof/docs/pdf', $file);

            $request->request->add(['file' => $path]);
        }

        $pof = PofDocument::create($request->except(['tmp_file']));

        return redirect()->route('pof.documents.index')->with('success', "Documento de P.O.F. cargado correctamente. Id de la operación: <strong>{$pof->id}</strong>");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PofDocument $document
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(PofDocument $document)
    {
        $document->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Documento de P.O.F. eliminado con éxito.']);
    }
}
