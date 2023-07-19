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

    protected $id;
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


        //Inventory
        'not_access_index_inventory' => 'INVENTORY/INVENTORY/NOT-AUTHORIZED-INDEX',
        'access_index_inventory' => 'INVENTORY/INVENTORY/AUTHORIZED-INDEX',
        'not_access_create_inventory' => 'INVENTORY/INVENTORY/NOT-AUTHORIZED-CREATE-VIEW',
        'access_create_inventory' => 'INVENTORY/INVENTORY/AUTHORIZED-CREATE-VIEW',
        'not_access_store_inventory' => 'INVENTORY/INVENTORY/NOT-AUTHORIZED-STORE',
        'access_store_inventory' => 'INVENTORY/INVENTORY/AUTHORIZED-STORE',
        'not_access_edit_inventory' => 'INVENTORY/INVENTORY/NOT-AUTHORIZED-EDIT-VIEW',
        'access_edit_inventory' => 'INVENTORY/INVENTORY/AUTHORIZED-EDIT-VIEW',
        'not_access_update_inventory' => 'INVENTORY/INVENTORY/NOT-AUTHORIZED-UPDATE',
        'access_update_inventory' => 'INVENTORY/INVENTORY/AUTHORIZED-UPDATE',
        'not_access_destroy_inventory' => 'INVENTORY/INVENTORY/NOT-AUTHORIZED-DESTROY',
        'access_destroy_inventory' => 'INVENTORY/INVENTORY/AUTHORIZED-DESTROY',
        'not_access_show_inventory' => 'INVENTORY/INVENTORY/NOT-AUTHORIZED-SHOW',
        'access_show_inventory' => 'INVENTORY/INVENTORY/AUTHORIZED-SHOW',
        'not_access_status_inventory' => 'INVENTORY/INVENTORY/NOT-AUTHORIZED-CHANGE-STATUS',
        'access_status_inventory' => 'INVENTORY/INVENTORY/CHANGE-STATUS',

        //Suscription
        'not_access_index_suscription' => 'INVENTORY/SUSCRIPTION/NOT-AUTHORIZED-INDEX',
        'access_index_suscription' => 'INVENTORY/SUSCRIPTION/AUTHORIZED-INDEX',
        'not_access_create_suscription' => 'INVENTORY/SUSCRIPTION/NOT-AUTHORIZED-CREATE-VIEW',
        'access_create_suscription' => 'INVENTORY/SUSCRIPTION/AUTHORIZED-CREATE-VIEW',
        'not_access_store_suscription' => 'INVENTORY/SUSCRIPTION/NOT-AUTHORIZED-STORE',
        'access_store_suscription' => 'INVENTORY/SUSCRIPTION/AUTHORIZED-STORE',
        'not_access_edit_suscription' => 'INVENTORY/SUSCRIPTION/NOT-AUTHORIZED-EDIT-VIEW',
        'access_edit_suscription' => 'INVENTORY/SUSCRIPTION/AUTHORIZED-EDIT-VIEW',
        'not_access_update_suscription' => 'INVENTORY/SUSCRIPTION/NOT-AUTHORIZED-UPDATE',
        'access_update_suscription' => 'INVENTORY/SUSCRIPTION/AUTHORIZED-UPDATE',
        'not_access_destroy_suscription' => 'INVENTORY/SUSCRIPTION/NOT-AUTHORIZED-DESTROY',
        'access_destroy_suscription' => 'INVENTORY/SUSCRIPTION/AUTHORIZED-DESTROY',
        'not_access_show_suscription' => 'INVENTORY/SUSCRIPTION/NOT-AUTHORIZED-SHOW',
        'access_show_suscription' => 'INVENTORY/SUSCRIPTION/AUTHORIZED-SHOW',
        'not_access_status_suscription' => 'INVENTORY/SUSCRIPTION/NOT-AUTHORIZED-CHANGE-STATUS',
        'access_status_suscription' => 'INVENTORY/SUSCRIPTION/CHANGE-STATUS',


        //Payment
        'not_access_index_payment' => 'INVENTORY/PAYMENT/NOT-AUTHORIZED-INDEX',
        'access_index_payment' => 'INVENTORY/PAYMENT/AUTHORIZED-INDEX',
        'not_access_create_payment' => 'INVENTORY/PAYMENT/NOT-AUTHORIZED-CREATE-VIEW',
        'access_create_payment' => 'INVENTORY/PAYMENT/AUTHORIZED-CREATE-VIEW',
        'not_access_store_payment' => 'INVENTORY/PAYMENT/NOT-AUTHORIZED-STORE',
        'access_store_payment' => 'INVENTORY/PAYMENT/AUTHORIZED-STORE',
        'not_access_edit_payment' => 'INVENTORY/PAYMENT/NOT-AUTHORIZED-EDIT-VIEW',
        'access_edit_payment' => 'INVENTORY/PAYMENT/AUTHORIZED-EDIT-VIEW',
        'not_access_update_payment' => 'INVENTORY/PAYMENT/NOT-AUTHORIZED-UPDATE',
        'access_update_payment' => 'INVENTORY/PAYMENT/AUTHORIZED-UPDATE',
        'not_access_destroy_payment' => 'INVENTORY/PAYMENT/NOT-AUTHORIZED-DESTROY',
        'access_destroy_payment' => 'INVENTORY/PAYMENT/AUTHORIZED-DESTROY',
        'not_access_show_payment' => 'INVENTORY/PAYMENT/NOT-AUTHORIZED-SHOW',
        'access_show_payment' => 'INVENTORY/PAYMENT/AUTHORIZED-SHOW',
        'not_access_status_payment' => 'INVENTORY/PAYMENT/NOT-AUTHORIZED-CHANGE-STATUS',
        'access_status_payment' => 'INVENTORY/PAYMENT/CHANGE-STATUS',

        //Partner
        'not_access_index_partner' => 'INVENTORY/PARTNER/NOT-AUTHORIZED-INDEX',
        'access_index_partner' => 'INVENTORY/PARTNER/AUTHORIZED-INDEX',
        'not_access_create_partner' => 'INVENTORY/PARTNER/NOT-AUTHORIZED-CREATE-VIEW',
        'access_create_partner' => 'INVENTORY/PARTNER/AUTHORIZED-CREATE-VIEW',
        'not_access_store_partner' => 'INVENTORY/PARTNER/NOT-AUTHORIZED-STORE',
        'access_store_partner' => 'INVENTORY/PARTNER/AUTHORIZED-STORE',
        'not_access_edit_partner' => 'INVENTORY/PARTNER/NOT-AUTHORIZED-EDIT-VIEW',
        'access_edit_partner' => 'INVENTORY/PARTNER/AUTHORIZED-EDIT-VIEW',
        'not_access_update_partner' => 'INVENTORY/PARTNER/NOT-AUTHORIZED-UPDATE',
        'access_update_partner' => 'INVENTORY/PARTNER/AUTHORIZED-UPDATE',
        'not_access_destroy_partner' => 'INVENTORY/PARTNER/NOT-AUTHORIZED-DESTROY',
        'access_destroy_partner' => 'INVENTORY/PARTNER/AUTHORIZED-DESTROY',
        'not_access_show_partner' => 'INVENTORY/PARTNER/NOT-AUTHORIZED-SHOW',
        'access_show_partner' => 'INVENTORY/PARTNER/AUTHORIZED-SHOW',
        'not_access_status_partner' => 'INVENTORY/PARTNER/NOT-AUTHORIZED-CHANGE-STATUS',
        'access_status_partner' => 'INVENTORY/PARTNER/CHANGE-STATUS',
        

        //Module
        'not_access_index_module' => 'SECURITY/MODULE/NOT-AUTHORIZED-INDEX',
        'access_index_module' => 'SECURITY/MODULE/AUTHORIZED-INDEX',
        'not_access_create_module' => 'SECURITY/MODULE/NOT-AUTHORIZED-CREATE-VIEW',
        'access_create_module' => 'SECURITY/MODULE/AUTHORIZED-CREATE-VIEW',
        'not_access_store_module' => 'SECURITY/MODULE/NOT-AUTHORIZED-STORE',
        'access_store_module' => 'SECURITY/MODULE/AUTHORIZED-STORE',
        'not_access_edit_module' => 'SECURITY/MODULE/NOT-AUTHORIZED-EDIT-VIEW',
        'access_edit_module' => 'SECURITY/MODULE/AUTHORIZED-EDIT-VIEW',
        'not_access_update_module' => 'SECURITY/MODULE/NOT-AUTHORIZED-UPDATE',
        'access_update_module' => 'SECURITY/MODULE/AUTHORIZED-UPDATE',
        'not_access_destroy_module' => 'SECURITY/MODULE/NOT-AUTHORIZED-DESTROY',
        'access_destroy_module' => 'SECURITY/MODULE/AUTHORIZED-DESTROY',
        'not_access_show_module' => 'SECURITY/MODULE/NOT-AUTHORIZED-SHOW',
        'access_show_module' => 'SECURITY/MODULE/AUTHORIZED-SHOW',
        'not_access_status_module' => 'SECURITY/MODULE/NOT-AUTHORIZED-CHANGE-STATUS',
        'access_status_module' => 'SECURITY/MODULE/CHANGE-STATUS',
        




        // Audit Trail
        'not_access_index_audit' => 'AUDIT/AUDIT-TRAIL/NOT-AUTHORIZED-INDEX',
        'access_index_audit' => 'AUDIT/AUDIT-TRAIL/AUTHORIZED-INDEX',
        'acces_user_actions' => 'AUDIT/AUDIT-TRAIL/USER-ACTIONS',
        'not_access_user_actions' => 'AUDIT/AUDIT-TRAIL/NOT-AUTHORIZED-USER-ACTIONS',

    ];


    protected function addAudit($user, $type, $data_old = null,$data_new=null)
    {
        // Es te es mi modelo de auditoria
        // $morphPrefix = config('audit.user.morph_prefix', 'user');

        // $table->bigIncrements('id');
        // $table->string($morphPrefix . '_type')->nullable();
        // $table->unsignedBigInteger($morphPrefix . '_id')->nullable();
        // $table->string('event');
        // $table->morphs('auditable');
        // $table->text('old_values')->nullable();
        // $table->text('new_values')->nullable();
        // $table->text('url')->nullable();
        // $table->ipAddress('ip_address')->nullable();
        // $table->string('user_agent', 1023)->nullable();
        // $table->string('tags')->nullable();

        // $table->timestamps();

        // $table->index([$morphPrefix . '_id', $morphPrefix . '_type']);

        $audit = new AuditTrail();
        $audit->user_id = $user->id;
        $audit->user_type = get_class($user);
        $audit->event = $type;
        $audit->auditable_type = get_class($this);
        if ($this->id !== null) {
            $audit->auditable_id = $this->id;
        } else {
            // Set a default value for auditable_id if $this->id is null
            $audit->auditable_id = 0;
        }
        //este valor es agarrado del data
        $audit-> old_values = $data_old;
        $audit->new_values = $data_new;
        $audit->url = request()->fullUrl();
        $audit->ip_address = request()->ip();
        $audit->user_agent = request()->userAgent();
        //$audit->tags = implode(',', $this->auditTags ?? []);
        $audit->save();
        
        
    }
}
