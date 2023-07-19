<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Repositories\InventoryRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Response;

class InventoryController extends Controller
{
    /** @var InventoryRepository $inventoryRepository*/
    private $inventoryRepository;

    public function __construct(InventoryRepository $inventoryRepo)
    {
        $this->inventoryRepository = $inventoryRepo;
    }

    /**
     * Display a listing of the Inventory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $rol_names = array("administrator", "operator", "user");


        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_index_inventory'], '');
            return redirect()->route('dashboard')->with('error', 'Usted no tiene permiso!');
        }
        

        $inventories = $this->inventoryRepository->all();

        $this->addAudit(Auth::user(), $this->typeAudit['access_index_inventory'], '');

        return view('inventories.index')
            ->with('inventories', $inventories);
    }

    /**
     * Show the form for creating a new Inventory.
     *
     * @return Response
     */
    public function create()
    {
        $rol_names = array( "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_create_inventory'], '');
            return redirect()->route('inventories.index')->with('error', 'Usted no tiene permiso!');
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_create_inventory'], '');
        return view('inventories.create');
    }

    /**
     * Store a newly created Inventory in storage.
     *
     * @param CreateInventoryRequest $request
     *
     * @return Response
     */
    public function store(CreateInventoryRequest $request)
    {

        $rol_names = array( "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_store_inventory'], '');
            return redirect()->route('inventories.index')->with('error', 'Usted no tiene permiso!');
        }

        $input = $request->all();

        $inventory = $this->inventoryRepository->create($input);

        $data_new = json_encode($inventory);

        $this->addAudit(Auth::user(), $this->typeAudit['access_create_inventory'],'', $data_new);

        return redirect()->route('inventories.index')->with('success', 'Máquina registrada correctamente');
    }

    /**
     * Display the specified Inventory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $rol_names = array("administrator", "operator", "user");
        
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_show_inventory'], '');
            return redirect()->route('dashboard')->with('error', 'Usted no tiene permiso!');
        }

        $inventory = $this->inventoryRepository->find($id);

        if (empty($inventory)) {

            return redirect(route('inventories.index'));
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_show_inventory'], '');
        return view('inventories.show')->with('inventory', $inventory);
    }

    /**
     * Show the form for editing the specified Inventory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $rol_names = array( "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_edit_inventory'], '');
            return redirect()->route('inventories.index')->with('error', 'Usted no tiene permiso!');
        }

        $inventory = $this->inventoryRepository->find($id);

        if (empty($inventory)) {

            return redirect(route('inventories.index'));
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_edit_inventory'], '');
        return view('inventories.edit')->with('inventory', $inventory);
    }

    /**
     * Update the specified Inventory in storage.
     *
     * @param int $id
     * @param UpdateInventoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInventoryRequest $request)
    {
        $role_names = array( "operator", "user");
        if (!Gate::allows('has_role', [$role_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_update_inventory'], '');
            return redirect()->route('inventories.index')->with('error', 'Usted no tiene permiso!');
        }

        $data_old = Inventory::find($id);
        $data_old = $data_old->toJson();

        $inventory = $this->inventoryRepository->find($id);

        if (empty($inventory)) {

            return redirect(route('inventories.index'));
        }

        $inventory = $this->inventoryRepository->update($request->all(), $id);


        $data_new = json_encode($inventory);

        $this->addAudit(Auth::user(), $this->typeAudit['access_update_inventory'], $data_old, $data_new);

        return redirect()->route('inventories.index')->with('success', 'Máquina actualizada correctamente');
    }

    /**
     * Remove the specified Inventory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {

        $rol_names = array( "operator");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_destroy_inventory'], '');
            return redirect()->route('inventories.index')->with('error', 'Usted no tiene permiso!');
        }

        $inventory = $this->inventoryRepository->find($id);

        if (empty($inventory)) {

            return redirect(route('inventories.index'));
        }

        $this->inventoryRepository->delete($id);


        $this->addAudit(Auth::user(), $this->typeAudit['access_destroy_inventory'], $inventory->toJson(), '');
        return redirect(route('inventories.index'));
    }
}
