<?php

namespace App\Http\Controllers\staff\employee;

use App\Http\Controllers\Controller;
use App\Models\staff\employee\Employee;
use App\Models\staff\occupation\Occupation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $rol_names = array("administrator","operator","user");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_index_employee'], '');
            return redirect()->route('dashboard')->with('error', 'Usted no tiene permiso para ver empleados!');
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_index_employee'], '');
        $employees = Employee::all();
        return view('staff.employee.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rol_names = array("administrator","user");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_create_employee'], '');
            return redirect()->route('employee.index')->with('error', 'Usted no tiene permiso para crear empleados!');
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_create_employee'], '');
        $occupations = Occupation::all();
        return view('staff.employee.create', ['occupations' => $occupations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol_names = array("administrator","user");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_store_employee'], '');
            return redirect()->route('employee.index')->with('error', 'Usted no tiene permiso para crear empleados!');
        }

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'identify' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'occupation' => 'required|exists:occupations,id',
        ]);

        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->identify = $request->identify;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->occupation_id = $request->occupation;
        $employee->save();
        $data_new=$employee->toJson();

        $this->addAudit(Auth::user(), $this->typeAudit['access_store_employee'],'', $data_new);

        return redirect()->route('employee.index')->with('success', 'Empleado creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol_names = array("administrator","operator","user");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_show_employee'], '');
            return redirect()->route('employee.index')->with('error', 'Usted no tiene permiso para mostrar empleados!');
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_show_employee'], '');
        $employee = Employee::find($id);
        return view('staff.employee.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rol_names = array("administrator","operator");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_edit_employee'], '');
            return redirect()->route('employee.index')->with('error', 'Usted no tiene permiso para editar empleados!');
        }
        $employee = Employee::find($id);
        $occupations = Occupation::all();

        $this->addAudit(Auth::user(), $this->typeAudit['access_edit_employee'], '');

        return view('staff.employee.edit', ['employee' => $employee, 'occupations' => $occupations]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'identify' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'occupation' => 'required|exists:occupations,id',
        ]);

        $data_old = Employee::find($id);
        $data_old = $data_old->toJson();

        $employee = Employee::find($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->identify = $request->identify;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->occupation_id = $request->occupation;
        $employee->save();

        $data_new = $employee->toJson();
        $this->addAudit(Auth::user(), $this->typeAudit['access_update_employee'], $data_old, $data_new);
        return redirect()->route('employee.index')->with('success', 'Empleado actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol_names = array("administrator","operator");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_destroy_employee'], '');
            return redirect()->route('employee.index')->with('error', 'Usted no tiene permiso para eliminar empleados!');
        }

        $employee = Employee::find($id);
        $relatedemployees = User::where('employee_id', $employee->id)->count();
        if ($relatedemployees > 0) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_destroy_employee'], '');
            return redirect()->back()->with('error', 'No se puede eliminar el empleado porque tiene usuarios relacionados');
        }
        $employee->delete();
        $this->addAudit(Auth::user(), $this->typeAudit['access_destroy_employee'], $employee->toJson(), '');
        return redirect()->back()->with('success', 'Empleado eliminado con éxito');
    }
}
