<?php

namespace App\Http\Controllers\security\role;

use App\Http\Controllers\Controller;
use App\Models\staff\role\Role;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate as FacadesGate;

class RoleController extends Controller
{
    public function index()
    {
        // $rola_name=array('administrator');
        // if(!FacadesGate::allows('has-rol',$rola_name)){
        //     $this->addAudit(Auth::user(),$this->typeAudit['not_access_index_role'],'');
        //     return redirect()->route('dashboard')->with('warning',__('You do not have permission to access!'));
        // }

        $this->addAudit(Auth::user(),$this->typeAudit['access_index_role'],'');
        return view('security.role.index',['roles'=>Role::all()]);
    }
}
