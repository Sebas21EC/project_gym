<?php

namespace App\Http\Controllers\security\user;

use App\Http\Controllers\Controller;
use App\Models\staff\employee\Employee;
use App\Models\staff\role\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

        $rol_names = array("administrator", "operator");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_index_user'], '');
            return redirect()->route('dashboard')->with('error', 'Usted no tiene permiso para ver usuarios!');
        }

        $users = User::all();

        foreach ($users as $user) {
            $active_roles = array();
            foreach ($user->roles as $role) {
                if ($role->is_active == 1) {
                    array_push($active_roles, $role);
                }
            }
            $user->roles = $active_roles;
        }


        $this->addAudit(Auth::user(), $this->typeAudit['access_index_user'], '');
        return view('security.user.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rol_names = array("administrator", "operator");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_create_user'], '');
            return redirect()->route('user.index')->with('error', 'Usted no tiene permiso para crear usuarios!');
        }


        $available_roles = Role::all()->where('is_active', 1);
        $available_employees = Employee::all();
        $this->addAudit(Auth::user(), $this->typeAudit['access_create_user'], '');
        return view('security.user.create', ['available_roles' => $available_roles, 'available_employees' => $available_employees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role_names = array("administrator", "operator");
        if (!Gate::allows('has_role', [$role_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_store_user'], '');
            return redirect()->route('user.index')->with('error', 'Usted no tiene permiso para crear usuarios!');
        }

        $userValidated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'min:3', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'max:255'],
            'selected_roles' => ['array'],
            'employee_id' => ['required'],
            'is_active' => ['required'],
        ]);


        $user = new User($userValidated);
        $user->save();


        if (isset($userValidated['selected_roles'])) {
            foreach ($userValidated['selected_roles'] as $role_id) {
                $user->roles()->attach($role_id);
            }
        }

        $data_new = $user->toJson();
        $this->addAudit(Auth::user(), $this->typeAudit['access_store_user'],'', $data_new);
        return redirect()->route('user.index')->with('success', 'Usuario creado con exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rol_names = array("administrator", "operator");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_edit_user'], '');
            return redirect()->route('user.index')->with('error', 'Usted no tiene permiso para editar usuarios!');
        }


        $user = User::findOrFail($id);
        $user->password = '';

        // Get only asignation and roles that are activated
        $active_roles = array();
        foreach ($user->roles as $role) {
            if ($role->pivot->is_active == 1 && $role->is_active == 1) {
                array_push($active_roles, $role);
            }
        }
        $user->roles = $active_roles;
        $id_active_roles = array();
        foreach ($user->roles as $role) {
            array_push($id_active_roles, $role->id);
        }

        // Get only available roles
        $available_roles = Role::all()->where('is_active', 1)->whereNotIn('id', $id_active_roles);
        $available_employees = Employee::all();

        $this->addAudit(Auth::user(), $this->typeAudit['access_edit_user'], '');
        return view('security.user.edit', ['user' => $user, 'available_roles' => $available_roles, 'available_employees' => $available_employees]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roleNames = array("administrator", "operator");
        if (!Gate::allows('has_role', [$roleNames])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_update_user'], '');
            return redirect()->route('dashboard')->with('error', 'No tiene permisos para acceder a esta sección.');
        }

        $userValidated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'min:3', 'max:255', Rule::unique('users')->ignore($id),],
            'is_active' => ['required'],
            'selected_roles' => ['array'],
            'employee_id' => ['required'],
        ]);

        if (!isset($userValidated['selected_roles'])) {
            $userValidated['selected_roles'] = array();
        }
        $data_old = User::find($id);
        $data_old = $data_old->toJson();

        $user = User::findOrFail($id);
        $user->fill($userValidated);

        // Todo - Validate if role is active

        // Delete roles that are not selected
        foreach ($user->roles as $role) {
            if (!in_array($role->pivot['role_id'], $userValidated['selected_roles'])) {
                $role->pivot['is_active'] = false;
                $role->pivot->save();
            }
        }

        foreach ($userValidated['selected_roles'] as $role_id) {
            // Check if the user already has the role
            if ($user->roles->pluck('id')->contains($role_id)) {
                continue;
            }

            // Check if the role is new
            if (!$user->roles->pluck('id')->contains($role_id)) {
                $user->roles()->attach($role_id);
            }
        }

        $user->save();
        $data_new = $user->toJson();
        $this->addAudit(Auth::user(), $this->typeAudit['access_update_user'], $data_old, $data_new);
        return redirect()->route('user.index')->with('success', 'Usuario actualizado con exitosamente.');
    }

    public function destroy(string $id)
    {
        $rol_names = array("administrator");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_destroy_user'], '');
            return redirect()->route('user.index')->with('error', 'Usted no tiene permiso para desactivar usuarios!');
        }

        $user = User::find($id);
        
            $user->is_active = 0;
            $user->save();

            $this->addAudit(Auth::user(), $this->typeAudit['access_destroy_role'], $user->toJson());
            return redirect()->route('user.index')->with('success', 'Usuario desactivado con éxito');
    }

    
}
