<?php

namespace App\Http\Controllers\security\role;

use App\Http\Controllers\Controller;
use App\Models\staff\role\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;




class RoleController extends Controller 
{
   // use OwenIt\Auditing\Auditable;

   protected $id;
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

    //get atributos
  

    public function create()
    {
        $rol_names = array("administrator");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_create_role'], '');
            return redirect()->route('role.index')->with('error', 'Usted no tiene permiso para crear roles!');
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_create_role'],'');

       
        return view('security.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $role_names = array("administrator");
        // if (!Gate::allows('has_role', [$role_names])) {
        //     $this->addAudit(Auth::user(), $this->typeAudit['not_access_store_role'], '');
        //     return redirect()->route('role.index')->with('error', 'Usted no tiene permiso para crear roles!');
        // }

        $request->validate([
            'role_name' => 'required'

        ]);
        $role = new Role();
        $role->role_name = $request->role_name;

        $role->is_active = $request->is_active == 1 ? true : false;
        $role->save();

        $this->addAudit(Auth::user(), $this->typeAudit['access_store_role'],'', $role->toJson());
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
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_edit_role'], '');
            return redirect()->route('role.index')->with('error', 'Usted no tiene permiso para editar roles!');
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_edit_role'], '');
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
        //recolectar los datos antes de ser actualizados en un jason para enviarselos al audit
        $data_old = Role::find($id);
        $data_old=$data_old->toJson();

        $role = Role::find($id);
        $role->role_name = $request->role_name;
        $role->is_active = $request->is_active == 1 ? true : false;
        $role->save();
        $data_new = $role->toJson();

        $this->addAudit(Auth::user(), $this->typeAudit['access_update_role'], $data_old, $data_new);
        return redirect()->route('role.index')->with('success', 'Rol actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol_names = array("administrator");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_destroy_role'], '');
            return redirect()->route('role.index')->with('error', 'Usted no tiene permiso para desactivar roles!');
        }

        $role = Role::find($id);
        if ($role->id == 1) {
            return redirect()->back()->with('error', 'No puedes eliminar el rol principal');
        } else {
            $role->is_active = 0;
            $role->save();

            $this->addAudit(Auth::user(), $this->typeAudit['access_destroy_role'], $role->toJson());
            return redirect()->route('role.index')->with('success', 'Rol desactivado con éxito');
        }
    }


}
