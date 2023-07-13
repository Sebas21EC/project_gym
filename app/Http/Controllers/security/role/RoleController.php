<?php

namespace App\Http\Controllers\security\role;

use App\Http\Controllers\Controller;
use App\Models\staff\role\Role;
use App\Models\staff\role_user\Role_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        $rol_names = array("administrator");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_index_role'], '');
            return redirect()->route('dashboard')->with('error', 'Usted no tiene permiso para ver roles!');
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_index_role'], '');
        return view('security.role.index', ['roles' => Role::all()]);
    }


    public function create()
    {
        $rol_names = array("administrator");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_index_role'], '');
            return redirect()->route('role.index')->with('error', 'Usted no tiene permiso para crear roles!');
        }
        return view('security.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required'

        ]);
        $role = new Role();
        $role->role_name = $request->role_name;

        $role->is_active = $request->is_active == 1 ? true : false;
        $role->save();

        return redirect()->route('role.index')->with('success', 'Rol creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rol_names = array("administrator");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_index_role'], '');
            return redirect()->route('role.index')->with('error', 'Usted no tiene permiso para editar roles!');
        }
        $role = Role::find($id);
        return view('security.role.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'role_name' => 'required'
        ]);
        $role = Role::find($id);
        $role->role_name = $request->role_name;
        $role->is_active = $request->is_active == 1 ? true : false;
        $role->save();

        return redirect()->route('role.index')->with('success', 'Rol actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol_names = array("administrator");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_index_role'], '');
            return redirect()->route('role.index')->with('error', 'Usted no tiene permiso para desactivar roles!');
        }

        $role = Role::find($id);
        if ($role->id == 1) {
            return redirect()->back()->with('error', 'No puedes eliminar el rol principal');
        } else {
            $role->is_active = 0;
            $role->save();
            return redirect()->route('role.index')->with('success', 'Rol desactivado con éxito');
        }
    }
}
