<?php

namespace App\Http\Controllers\security\module;

use App\Http\Controllers\Controller;
use App\Models\staff\module\Module;
use App\Models\staff\role\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class ModuleController extends Controller
{
    public function index()
    {
       

        $modules = Module::all();

        foreach ($modules as $module) {
            $active_roles = array();
            if ($module->roles !== null) {
                foreach ($module->roles as $role) {
                        array_push($active_roles, $role);
                }
            }
            $module->roles = $active_roles;
        }


        $this->addAudit(Auth::user(), $this->typeAudit['access_index_user'], '');
        return view('security.module.index', [
            'modules' => $modules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $roleNames = array("ADMINSTRADOR_DE_SISTEMA");
        // if (!Gate::allows('has-rol', [$roleNames])) {
        //     $this->addAudit(Auth::user(), $this->typeAudit['not_access_create_user'], '');
        //     return redirect()->route('dashboard')->with('error', 'No tiene permisos para acceder a esta sección.');
        // }


        $available_roles = Role::all()->where('status', 1);
        $this->addAudit(Auth::user(), $this->typeAudit['access_create_module'], '');
        return view('security.module.create', ['available_roles' => $available_roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $roleNames = array("ADMINSTRADOR_DE_SISTEMA");
        // if (!Gate::allows('has-rol', [$roleNames])) {
        //     $this->addAudit(Auth::user(), $this->typeAudit['not_access_store_user'], '');
        //     return redirect()->route('dashboard')->with('error', 'No tiene permisos para acceder a esta sección.');
        // }

        // Schema::create('modules', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('description');
        //     $table->boolean('is_active')->default(true);
        //     $table->timestamps();
        // });

        $moduleValidated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:modules'],
            'description' => ['required', 'string', 'min:3', 'max:255'],
            'is_active' => ['required'],
            'selected_roles' => ['array'],           
        ]);


        $module = new Module($moduleValidated);
        $module->save();


        if (isset($moduleValidated['selected_roles'])) {
            foreach ($moduleValidated['selected_roles'] as $role_id) {
                $module->roles()->attach($role_id);
            }
        }

        $data_new = $module->toJson();
        $this->addAudit(Auth::user(), $this->typeAudit['access_store_module'], $data_new);
        return redirect()->route('module.index')->with('success', 'Modulo creado con exitosamente.');
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
        // $roleNames = array("ADMINSTRADOR_DE_SISTEMA");
        // if (!Gate::allows('has-rol', [$roleNames])) {
        //     $this->addAudit(Auth::user(), $this->typeAudit['not_access_edit_user'], 'user_id: ' . $id);
        //     return redirect()->route('dashboard')->with('error', 'No tiene permisos para acceder a esta sección.');
        // }


        $module = Module::findOrFail($id);

        // Get only asignation and roles that are activated
        $active_roles = array();
        foreach ($module->roles as $role) {
            if ($role->pivot->is_active == 1 && $role->status == 1) {
                array_push($active_roles, $role);
            }
        }
        $module->roles = $active_roles;

        $id_active_roles = array();
        foreach ($module->roles as $role) {
            array_push($id_active_roles, $role->id);
        }

        // Get only available roles
        $available_roles = Role::all()->where('status', 1)->whereNotIn('id', $id_active_roles);

        $this->addAudit(Auth::user(), $this->typeAudit['access_edit_module'], 'module_id: ' . $id);
        return view('security.module.edit', ['module' => $module, 'available_roles' => $available_roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $roleNames = array("ADMINSTRADOR_DE_SISTEMA");
        // if (!Gate::allows('has-rol', [$roleNames])) {
        //     $this->addAudit(Auth::user(), $this->typeAudit['not_access_update_user'], 'user_id: ' . $id);
        //     return redirect()->route('dashboard')->with('error', 'No tiene permisos para acceder a esta sección.');
        // }

        $moduleValidated = $request->validate([
        
            'name' => ['required', 'string', 'min:3', 'max:255', Rule::unique('modules')->ignore($id)],
            'description' => ['required', 'string', 'min:3', 'max:255'],
            'is_active' => ['required'],
            'selected_roles' => ['array'],           
        ]);

        if (!isset($moduleValidated['selected_roles'])) {
            $moduleValidated['selected_roles'] = array();
        }

        $module = Module::findOrFail($id);
        $module->fill($moduleValidated);

        // Todo - Validate if role is active

        // Delete roles that are not selected
        foreach ($module->roles as $role) {
            if (!in_array($role->pivot['role_id'], $moduleValidated['selected_roles'])) {
                $role->pivot['is_active'] = false;
                $role->pivot->save();
            }
        }

        foreach ($moduleValidated['selected_roles'] as $role_id) {
            // Check if the user already has the role
            if ($module->roles->pluck('id')->contains($role_id)) {
                continue;
            }

            // Check if the role is new
            if (!$module->roles->pluck('id')->contains($role_id)) {
                $module->roles()->attach($role_id);
            }
        }

        $module->save();

        $this->addAudit(Auth::user(), $this->typeAudit['access_update_module'], 'user_id: ' . $id);
        return redirect()->route('Module.index')->with('success', 'Module actualizado con exitosamente.');
    }
}
