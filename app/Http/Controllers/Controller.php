<?php

namespace App\Http\Controllers;

use App\Models\audit_trail\AuditTrail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use AuthorizesRequests, ValidatesRequests;

    /*
        Data must be: alias => module/controller/name-action
    */
    protected $typeAudit = [
        // ***SECURYTY***

        //role
        'not_access_index_role' => 'SECURITY/ROLE/NOT-AUTHORIZED-INDEX',
        'access_index_role' => 'SECURITY/ROLE/AUTHORIZED-INDEX',
        'not_access_create_role' => 'SECURITY/ROLE/NOT-AUTHORIZED-CREATE-VIEW',
        'access_create_role' => 'SECURITY/ROLE/AUTHORIZED-CREATE-VIEW',
        'not_access_store_role' => 'SECURITY/ROLE/NOT-AUTHORIZED-STORE',
        'access_store_role' => 'SECURITY/ROLE/AUTHORIZED-STORE',
        'not_access_edit_role' => 'SECURITY/ROLE/NOT-AUTHORIZED-EDIT-VIEW',
        'access_edit_role' => 'SECURITY/ROLE/AUTHORIZED-EDIT-VIEW',
        'not_access_update_role' => 'SECURITY/ROLE/NOT-AUTHORIZED-UPDATE',
        'access_update_role' => 'SECURITY/ROLE/AUTHORIZED-UPDATE',
        'not_access_destroy_role' => 'SECURITY/ROLE/NOT-AUTHORIZED-DESTROY',
        'access_destroy_role' => 'SECURITY/ROLE/AUTHORIZED-DESTROY',
        'not_access_show_role' => 'SECURITY/ROLE/NOT-AUTHORIZED-SHOW',
        'access_show_role' => 'SECURITY/ROLE/AUTHORIZED-SHOW',
        'not_access_status_role' => 'SECURITY/ROLE/NOT-AUTHORIZED-CHANGE-STATUS',
        'access_status_role' => 'SECURITY/ROLE/CHANGE-STATUS',

        //occupation
        'not_access_index_occupation' => 'SECURITY/OCCUPATION/NOT-AUTHORIZED-INDEX',
        'access_index_occupation' => 'SECURITY/OCCUPATION/AUTHORIZED-INDEX',
        'not_access_create_occupation' => 'SECURITY/OCCUPATION/NOT-AUTHORIZED-CREATE-VIEW',
        'access_create_occupation' => 'SECURITY/OCCUPATION/AUTHORIZED-CREATE-VIEW',
        'not_access_store_occupation' => 'SECURITY/OCCUPATION/NOT-AUTHORIZED-STORE',
        'access_store_occupation' => 'SECURITY/OCCUPATION/AUTHORIZED-STORE',
        'not_access_edit_occupation' => 'SECURITY/OCCUPATION/NOT-AUTHORIZED-EDIT-VIEW',
        'access_edit_occupation' => 'SECURITY/OCCUPATION/AUTHORIZED-EDIT-VIEW',
        'not_access_update_occupation' => 'SECURITY/OCCUPATION/NOT-AUTHORIZED-UPDATE',
        'access_update_occupation' => 'SECURITY/OCCUPATION/AUTHORIZED-UPDATE',
        'not_access_destroy_occupation' => 'SECURITY/OCCUPATION/NOT-AUTHORIZED-DESTROY',
        'access_destroy_occupation' => 'SECURITY/OCCUPATION/AUTHORIZED-DESTROY',
        'not_access_show_occupation' => 'SECURITY/OCCUPATION/NOT-AUTHORIZED-SHOW',
        'access_show_occupation' => 'SECURITY/OCCUPATION/AUTHORIZED-SHOW',
        'not_access_status_occupation' => 'SECURITY/OCCUPATION/NOT-AUTHORIZED-CHANGE-STATUS',
        'access_status_occupation' => 'SECURITY/OCCUPATION/CHANGE-STATUS',


        //user
        'not_access_index_user' => 'SECURITY/USER/NOT-AUTHORIZED-INDEX',
        'access_index_user' => 'SECURITY/USER/AUTHORIZED-INDEX',
        'not_access_create_user' => 'SECURITY/USER/NOT-AUTHORIZED-CREATE-VIEW',
        'access_create_user' => 'SECURITY/USER/AUTHORIZED-CREATE-VIEW',
        'not_access_store_user' => 'SECURITY/USER/NOT-AUTHORIZED-STORE',
        'access_store_user' => 'SECURITY/USER/AUTHORIZED-STORE',
        'not_access_edit_user' => 'SECURITY/USER/NOT-AUTHORIZED-EDIT-VIEW',
        'access_edit_user' => 'SECURITY/USER/AUTHORIZED-EDIT-VIEW',
        'not_access_update_user' => 'SECURITY/USER/NOT-AUTHORIZED-UPDATE',
        'access_update_user' => 'SECURITY/USER/AUTHORIZED-UPDATE',
        'not_access_destroy_user' => 'SECURITY/USER/NOT-AUTHORIZED-DESTROY',
        'access_destroy_user' => 'SECURITY/USER/AUTHORIZED-DESTROY',
        'not_access_show_user' => 'SECURITY/USER/NOT-AUTHORIZED-SHOW',
        'access_show_user' => 'SECURITY/USER/AUTHORIZED-SHOW',
        'not_access_status_user' => 'SECURITY/USER/NOT-AUTHORIZED-CHANGE-STATUS',
        'access_status_user' => 'SECURITY/USER/CHANGE-STATUS',



        //employee
        'not_access_index_employee' => 'SECURITY/EMPLOYEE/NOT-AUTHORIZED-INDEX',
        'access_index_employee' => 'SECURITY/EMPLOYEE/AUTHORIZED-INDEX',
        'not_access_create_employee' => 'SECURITY/EMPLOYEE/NOT-AUTHORIZED-CREATE-VIEW',
        'access_create_employee' => 'SECURITY/EMPLOYEE/AUTHORIZED-CREATE-VIEW',
        'not_access_store_employee' => 'SECURITY/EMPLOYEE/NOT-AUTHORIZED-STORE',
        'access_store_employee' => 'SECURITY/EMPLOYEE/AUTHORIZED-STORE',
        'not_access_edit_employee' => 'SECURITY/EMPLOYEE/NOT-AUTHORIZED-EDIT-VIEW',
        'access_edit_employee' => 'SECURITY/EMPLOYEE/AUTHORIZED-EDIT-VIEW',
        'not_access_update_employee' => 'SECURITY/EMPLOYEE/NOT-AUTHORIZED-UPDATE',
        'access_update_employee' => 'SECURITY/EMPLOYEE/AUTHORIZED-UPDATE',
        'not_access_destroy_employee' => 'SECURITY/EMPLOYEE/NOT-AUTHORIZED-DESTROY',
        'access_destroy_employee' => 'SECURITY/EMPLOYEE/AUTHORIZED-DESTROY',
        'not_access_show_employee' => 'SECURITY/EMPLOYEE/NOT-AUTHORIZED-SHOW',
        'access_show_employee' => 'SECURITY/EMPLOYEE/AUTHORIZED-SHOW',
        'not_access_status_employee' => 'SECURITY/EMPLOYEE/NOT-AUTHORIZED-CHANGE-STATUS',
        'access_status_employee' => 'SECURITY/EMPLOYEE/CHANGE-STATUS',







        // Audit Trail
        'not_access_index_audit' => 'AUDIT/AUDIT-TRAIL/NOT-AUTHORIZED-INDEX',
        'access_index_audit' => 'AUDIT/AUDIT-TRAIL/AUTHORIZED-INDEX',
        'acces_user_actions' => 'AUDIT/AUDIT-TRAIL/USER-ACTIONS',
        'not_access_user_actions' => 'AUDIT/AUDIT-TRAIL/NOT-AUTHORIZED-USER-ACTIONS',

    ];


    protected function addAudit($user, $type, $data = null)
    {
        $audit = new AuditTrail();
        $audit->user()->associate($user);
        $audit->type = $type;
        $audit->data = $data;
        $audit->save();
    }
}
