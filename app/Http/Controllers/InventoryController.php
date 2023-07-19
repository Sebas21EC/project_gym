<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Repositories\InventoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
        $inventories = $this->inventoryRepository->all();

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
        $input = $request->all();

        $inventory = $this->inventoryRepository->create($input);


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
        $inventory = $this->inventoryRepository->find($id);

        if (empty($inventory)) {

            return redirect(route('inventories.index'));
        }

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
        $inventory = $this->inventoryRepository->find($id);

        if (empty($inventory)) {

            return redirect(route('inventories.index'));
        }

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
        $inventory = $this->inventoryRepository->find($id);

        if (empty($inventory)) {

            return redirect(route('inventories.index'));
        }

        $inventory = $this->inventoryRepository->update($request->all(), $id);


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
        $inventory = $this->inventoryRepository->find($id);

        if (empty($inventory)) {

            return redirect(route('inventories.index'));
        }

        $this->inventoryRepository->delete($id);


        return redirect(route('inventories.index'));
    }
}
