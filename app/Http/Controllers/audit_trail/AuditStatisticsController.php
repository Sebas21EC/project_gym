<?php

namespace App\Http\Controllers\audit_trail;

use App\Models\audit_trail\AuditTrail;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class AuditStatisticsController extends Controller
{
    public function userActions()
    {

        $roleNames = array("auditor", "administrator");
        if (!Gate::allows('has_role', [$roleNames])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_user_actions'], '');
            return redirect()->route('dashboard')->with('error', 'No tiene permisos para acceder a esta página');
        }

        //Count the number of actions per user
        $audit_trails = User::selectRaw('users.id, users.name, count(audit_trails.id) as number_actions')
            ->leftjoin('audit_trails', 'users.id', '=', 'audit_trails.user_id')
            ->groupBy('users.id')->groupBy('users.name')
            ->orderBy('number_actions', 'desc')
            ->get();

     $likertColors = [
                'Muy Inactivo' => '#1E90FF',
                'Inactivo' => '#FFFF00',
                'Moderado' => '#00FF00',
                'Activo' => '#FFA500',
                'Muy Activo' => '#FF0000',
            ];

        //Get level of activity per user
        $actionsUser = [];
        foreach ($audit_trails as $audit_trail) {
            $actionsUser[$audit_trail->id] = $audit_trail->number_actions;
        }

        $likertLevelsUser = [];
        $maxNumberActions = max($actionsUser);
        foreach ($actionsUser as $key => $value) {
            $percentage = $value / $maxNumberActions * 100;

            if ($percentage >= 80) {
                $likertLevelsUser[$key] = 'Muy Activo';
            } elseif ($percentage >= 60) {
                $likertLevelsUser[$key] = 'Activo';
            } elseif ($percentage >= 40) {
                $likertLevelsUser[$key] = 'Moderado';
            } elseif ($percentage >= 20) {
                $likertLevelsUser[$key] = 'Incativo';
            } else {
                $likertLevelsUser[$key] = 'Muy Inactivo';
            }
        }

        $this->addAudit(Auth::user(), $this->typeAudit['acces_user_actions'], '');
        
        return view('audit_trail.user_actions', [
            'audits' => $audit_trails,
            'likertLevelsUser' => $likertLevelsUser,
            'likertColors' => $likertColors,
        ]);
    }
}
