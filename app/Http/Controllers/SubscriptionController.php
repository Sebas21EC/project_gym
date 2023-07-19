<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\SubscriptionType;
use App\Repositories\SubscriptionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Response;

class SubscriptionController extends Controller
{
    /** @var SubscriptionRepository $subscriptionRepository*/
    private $subscriptionRepository;

    public function __construct(SubscriptionRepository $subscriptionRepo)
    {
        $this->subscriptionRepository = $subscriptionRepo;
    }

    /**
     * Display a listing of the Subscription.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rol_names = array("administrator", "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_index_subscription'], '');
            return redirect()->route('dashboard')->with('error', 'Usted no tiene permiso!');
        }
        $subscriptions = $this->subscriptionRepository->all();

        $this->addAudit(Auth::user(), $this->typeAudit['access_index_subscription'], '');
        return view('subscriptions.index')
            ->with('subscriptions', $subscriptions);
    }

    /**
     * Show the form for creating a new Subscription.
     *
     * @return Response
     */
    public function create()
    {
        $subscriptionTypes = SubscriptionType::pluck('name', 'id');
        $nMonths = SubscriptionType::pluck('n_months', 'id');
        return view('subscriptions.create', compact('subscriptionTypes', 'nMonths'));
    }

    /**
     * Store a newly created Subscription in storage.
     *
     * @param CreateSubscriptionRequest $request
     *
     * @return Response
     */
    public function store(CreateSubscriptionRequest $request)
    {
        $input = $request->all();
        $request->validate([
            'partner_id' => ['required', Rule::exists('partners', 'id')],
        ]);
        $totalAmount = SubscriptionType::find($input['subscription_type_id'])->price;
        $input['total_amount'] = $totalAmount;
        $subscription = $this->subscriptionRepository->create($input);
        return redirect()->route('subscriptions.index')->with('success', 'Suscripción creada exitosamente.');
    }

    /**
     * Display the specified Subscription.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subscription = $this->subscriptionRepository->find($id);

        if (empty($subscription)) {

            return redirect(route('subscriptions.index'));
        }

        return view('subscriptions.show')->with('subscription', $subscription);
    }

    /**
     * Show the form for editing the specified Subscription.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subscription = $this->subscriptionRepository->find($id);
        $subscriptionTypes = SubscriptionType::pluck('name', 'id');
        $nMonths = SubscriptionType::pluck('n_months', 'id'); 

        if (empty($subscription)) {

            return redirect(route('subscriptions.index'));
        }

        return view('subscriptions.edit')->with('subscription', $subscription)
        ->with('subscriptionTypes', $subscriptionTypes)->with('nMonths', $nMonths);
    }

    /**
     * Update the specified Subscription in storage.
     *
     * @param int $id
     * @param UpdateSubscriptionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubscriptionRequest $request)
    {
        
        $subscription = $this->subscriptionRepository->find($id);
        if (empty($subscription)) {

            return redirect(route('subscriptions.index'));
        }
        $request->validate([
            'partner_id' => ['required', Rule::exists('partners', 'id')],
        ]);
        $totalAmount = SubscriptionType::find($request['subscription_type_id'])->price;
        $request['total_amount'] = $totalAmount;

        $subscription = $this->subscriptionRepository->update($request->all(), $id);


        return redirect()->route('subscriptions.index')->with('success', 'Suscripción actualizada exitosamente.');
    }

    /**
     * Remove the specified Subscription from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subscription = $this->subscriptionRepository->find($id);

        if (empty($subscription)) {

            return redirect(route('subscriptions.index'));
        }

        $this->subscriptionRepository->delete($id);


        return redirect(route('subscriptions.index'));
    }
}