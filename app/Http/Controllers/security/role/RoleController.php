<?php

namespace App\Http\Controllers\security\role;

use App\Http\Controllers\Controller;
use App\Models\staff\role\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        $rol_names=array("administrator");

        if(!Gate::allows('has_role', [$rol_names])){
            $this->addAudit(Auth::user(),$this->typeAudit['not_access_index_role'],'');
            return redirect()->route('dashboard')->with('error','You do not have permission to access!');
        }

        $this->addAudit(Auth::user(),$this->typeAudit['access_index_role'],'');
        return view('security.role.index',['roles'=>Role::all()]);
    }
}
