<?php

namespace App\Http\Controllers;

use App\Level;
use App\Pof;
use App\PofDocument;
use App\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PofDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(
                Pof::query()->with(['level','shift'])->orderBy('year','DESC')
            )->make(true);
        }

        return view('pof.upload.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::where('is_deleted', '0')->pluck('name', 'id');
        $shifts = Shift::where('is_deleted', '0')->pluck('name', 'id');

        return view('pof.upload.create', compact('levels', 'shifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($file = $request->file('tmp_file')) {
            $path = Storage::disk('public')->put('pof/docs/pdf/', $file);

            $request->request->add(['file' => $path]);
        }

        $pof = PofDocument::create($request->except(['tmp_file']));

        return redirect()->route('pof_document.index')->with('success', "Documento de P.O.F. cargado correctamente. Id de la operación: <strong>{$pof->id}</strong>");

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
}
