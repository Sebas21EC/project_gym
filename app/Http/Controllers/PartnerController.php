<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Repositories\PartnerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Response;

class PartnerController extends Controller
{
    /** @var PartnerRepository $partnerRepository*/
    private $partnerRepository;

    public function __construct(PartnerRepository $partnerRepo)
    {
        $this->partnerRepository = $partnerRepo;
    }

    /**
     * Display a listing of the Partner.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $rol_names = array("administrator", "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_index_partner'], '');
            return redirect()->route('dashboard')->with('error', 'Usted no tiene permiso!');
        }
        $partners = $this->partnerRepository->all();

        $this->addAudit(Auth::user(), $this->typeAudit['access_index_partner'], '');
        return view('partners.index')
            ->with('partners', $partners);
    }

    /**
     * Show the form for creating a new Partner.
     *
     * @return Response
     */
    public function create()
    {

        $rol_names = array( "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_create_partner'], '');
            return redirect()->route('partners.index')->with('error', 'Usted no tiene permiso!');
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_create_partner'], '');
        return view('partners.create');
    }

    /**
     * Store a newly created Partner in storage.
     *
     * @param CreatePartnerRequest $request
     *
     * @return Response
     */
    public function store(CreatePartnerRequest $request)
    {
        $role_names = array("operator", "user");
        if (!Gate::allows('has_role', [$role_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_store_partner'], '');
            return redirect()->route('partners.index')->with('error', 'Usted no tiene permiso!');
        }

        $input = $request->all();

        $partner = $this->partnerRepository->create($input);

        $data_new =json_encode($partner);

        $this->addAudit(Auth::user(), $this->typeAudit['access_store_partner'],'', $data_new); 

        return redirect()->route('partners.index')->with('success', 'Clienta creada con éxito');
    }

    /**
     * Display the specified Partner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $rol_names = array("administrator", "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_show_partner'], '');
            return redirect()->route('partners.index')->with('error', 'Usted no tiene permiso!');
        }

        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            // Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }

        return view('partners.show')->with('partner', $partner);
    }

    /**
     * Show the form for editing the specified Partner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role_names = array("operator", "user");
        if (!Gate::allows('has_role', [$role_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_edit_partner'], '');
            return redirect()->route('partners.index')->with('error', 'Usted no tiene permiso!');
        }

        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            // Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }
        $this->addAudit(Auth::user(), $this->typeAudit['access_edit_partner'], '');

        return view('partners.edit')->with('partner', $partner);
    }

    /**
     * Update the specified Partner in storage.
     *
     * @param int $id
     * @param UpdatePartnerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartnerRequest $request)
    {
        $role_names = array("operator", "user");
        if (!Gate::allows('has_role', [$role_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_update_partner'], '');
            return redirect()->route('partners.index')->with('error', 'Usted no tiene permiso!');
        }
        $data_old = json_encode($this->partnerRepository->find($id));

        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            // Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }

        $partner = $this->partnerRepository->update($request->all(), $id);

        $data_new = json_encode($partner);

        $this->addAudit(Auth::user(), $this->typeAudit['access_update_partner'], $data_old, $data_new);

        return redirect()->route('partners.index')->with('success', 'Clienta actualizado con éxito');
    }

    /**
     * Remove the specified Partner from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {

        $role_names = array("operator");
        if (!Gate::allows('has_role', [$role_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_destroy_partner'], '');
            return redirect()->route('partners.index')->with('error', 'Usted no tiene permiso!');
        }

        $partner = $this->partnerRepository->find($id);

        if (empty($partner)) {
            // Flash::error('Partner not found');

            return redirect(route('partners.index'));
        }

        $this->partnerRepository->delete($id);

        // Flash::success('Partner deleted successfully.');

        $data_old = json_encode($partner);

        $this->addAudit(Auth::user(), $this->typeAudit['access_destroy_partner'], $data_old, '');

        return redirect()->back()->with('success', 'Clienta eliminada con éxito');
    }
}
