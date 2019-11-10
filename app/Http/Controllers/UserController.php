<?php

namespace App\Http\Controllers;

use App\Agent;
use App\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use jeremykenedy\LaravelRoles\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
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
                User::where('is_deleted', '0')->with(['roles'])
            )->make(true);
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');

        $agents = Agent::where('is_deleted', '0')->orderBy('name')->get()->pluck('name', 'id');

        return view('users.create', compact('agents', 'roles'));
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
            'agent_id' => 'required|exists:agents,id',
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create($request->all());

        $user->attachRole($request->role_id);

        return redirect()->route('users.index')->with("success", "Usuario cargado correctamente. Id de la operación: <strong>{$user->id}</strong>");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        $user = $user->load('roles');

        $roles = Role::all()->pluck('name', 'id');

        $agents = Agent::where('is_deleted', '0')->orderBy('name')->get()->pluck('name', 'id');

        return view('users/edit', compact('agents', 'user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->detachAllRoles();

        $user->update($request->all());

        $user->attachRole($request->role_id);

        return redirect()->route('users.index')->with("success", "Usuario {$user->name} modificado correctamente. Id de la operación: <strong>{$user->id}</strong>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->update(['is_deleted' => '1']);

        return response()->json(['response' => true, 'message' => 'Usuario eliminado con éxito.']);
    }

}
