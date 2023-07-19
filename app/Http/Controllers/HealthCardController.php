<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHealthCardRequest;
use App\Http\Requests\UpdateHealthCardRequest;
use App\Repositories\HealthCardRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\HealthCard;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Response;

class HealthCardController extends Controller
{
    /** @var HealthCardRepository $healthCardRepository*/
    private $healthCardRepository;

    public function __construct(HealthCardRepository $healthCardRepo)
    {
        $this->healthCardRepository = $healthCardRepo;
    }

    /**
     * Display a listing of the HealthCard.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rol_names = array("administrator", "operator", "user");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_index_healthcard'], '');
            return redirect()->route('dashboard')->with('error', 'Usted no tiene permiso!');
        }
        
        $healthCards = $this->healthCardRepository->all();

        $this->addAudit(Auth::user(), $this->typeAudit['access_index_healthcard'], '');
        return view('health_cards.index')
            ->with('healthCards', $healthCards);
    }

    /**
     * Show the form for creating a new HealthCard.
     *
     * @return Response
     */
    public function create()
    {
        $rol_names = array( "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_create_healthcard'], '');
            return redirect()->route('healthCards.index')->with('error', 'Usted no tiene permiso!');
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_create_healthcard'], '');
        return view('health_cards.create');
    }

    /**
     * Store a newly created HealthCard in storage.
     *
     * @param CreateHealthCardRequest $request
     *
     * @return Response
     */
    public function store(CreateHealthCardRequest $request)
    {
        $rol_names = array( "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_store_healthcard'], '');
            return redirect()->route('healthCards.index')->with('error', 'Usted no tiene permiso!');
        }

        $input = $request->all();

        $healthCard = $this->healthCardRepository->create($input);

        ## recoger los datos ingresados en un Json para enviarlo al audit en un variable data_new
        $data_new = json_encode($healthCard);


        $this->addAudit(Auth::user(), $this->typeAudit['access_store_healthcard'], '', $data_new);

        return redirect(route('healthCards.index'));
    }

    /**
     * Display the specified HealthCard.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $rol_names = array("administrator", "operator", "user");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_show_healthcard'], '');
            return redirect()->route('healthCards.index')->with('error', 'Usted no tiene permiso!');
        }

        $healthCard = $this->healthCardRepository->find($id);

        if (empty($healthCard)) {
          

            return redirect(route('healthCards.index'));
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_show_healthcard'], '');
        return view('health_cards.show')->with('healthCard', $healthCard);
    }

    /**
     * Show the form for editing the specified HealthCard.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $rol_names = array( "operator", "user");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_edit_healthcard'], '');
            return redirect()->route('healthCards.index')->with('error', 'Usted no tiene permiso!');
        }

        $healthCard = $this->healthCardRepository->find($id);

        if (empty($healthCard)) {
           

            return redirect(route('healthCards.index'));
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_edit_healthcard'], '');
        return view('health_cards.edit')->with('healthCard', $healthCard);
    }

    /**
     * Update the specified HealthCard in storage.
     *
     * @param int $id
     * @param UpdateHealthCardRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHealthCardRequest $request)
    {
        $rol_names = array( "operator", "user");

        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_update_healthcard'], '');
            return redirect()->route('healthCards.index')->with('error', 'Usted no tiene permiso!');
        }

        $data_old = HealthCard::find($id);
        $data_old = $data_old->toJson();

        $healthCard = $this->healthCardRepository->find($id);

        if (empty($healthCard)) {
          

            return redirect(route('healthCards.index'));
        }

        $healthCard = $this->healthCardRepository->update($request->all(), $id);

        $data_new = json_encode($healthCard);
        $this->addAudit(Auth::user(), $this->typeAudit['access_update_healthcard'], $data_old, $data_new);       
        return redirect(route('healthCards.index'));
    }

    /**
     * Remove the specified HealthCard from storage.
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
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_destroy_healthcard'], '');
            return redirect()->route('healthCards.index')->with('error', 'Usted no tiene permiso!');
        }

        $healthCard = $this->healthCardRepository->find($id);

        if (empty($healthCard)) {
           
            return redirect(route('healthCards.index'));
        }

        $this->healthCardRepository->delete($id);

       $data_old = json_encode($healthCard);
        $this->addAudit(Auth::user(), $this->typeAudit['access_destroy_healthcard'], $data_old, '');

        return redirect(route('healthCards.index'));
    }
}
