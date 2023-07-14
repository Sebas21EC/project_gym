<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscriptionTypeRequest;
use App\Http\Requests\UpdateSubscriptionTypeRequest;
use App\Repositories\SubscriptionTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SubscriptionTypeController extends Controller
{
    /** @var SubscriptionTypeRepository $subscriptionTypeRepository*/
    private $subscriptionTypeRepository;

    public function __construct(SubscriptionTypeRepository $subscriptionTypeRepo)
    {
        $this->subscriptionTypeRepository = $subscriptionTypeRepo;
    }

    /**
     * Display a listing of the SubscriptionType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subscriptionTypes = $this->subscriptionTypeRepository->all();

        return view('subscription_types.index')
            ->with('subscriptionTypes', $subscriptionTypes);
    }

    /**
     * Show the form for creating a new SubscriptionType.
     *
     * @return Response
     */
    public function create()
    {
        return view('subscription_types.create');
    }

    /**
     * Store a newly created SubscriptionType in storage.
     *
     * @param CreateSubscriptionTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateSubscriptionTypeRequest $request)
    {
        $input = $request->all();

        $subscriptionType = $this->subscriptionTypeRepository->create($input);

        // Flash::success('Subscription Type saved successfully.');

        return redirect(route('subscriptionTypes.index'));
    }

    /**
     * Display the specified SubscriptionType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subscriptionType = $this->subscriptionTypeRepository->find($id);

        if (empty($subscriptionType)) {
            // Flash::error('Subscription Type not found');

            return redirect(route('subscriptionTypes.index'));
        }

        return view('subscription_types.show')->with('subscriptionType', $subscriptionType);
    }

    /**
     * Show the form for editing the specified SubscriptionType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subscriptionType = $this->subscriptionTypeRepository->find($id);

        if (empty($subscriptionType)) {
            // Flash::error('Subscription Type not found');

            return redirect(route('subscriptionTypes.index'));
        }

        return view('subscription_types.edit')->with('subscriptionType', $subscriptionType);
    }

    /**
     * Update the specified SubscriptionType in storage.
     *
     * @param int $id
     * @param UpdateSubscriptionTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubscriptionTypeRequest $request)
    {
        $subscriptionType = $this->subscriptionTypeRepository->find($id);

        if (empty($subscriptionType)) {
            // Flash::error('Subscription Type not found');

            return redirect(route('subscriptionTypes.index'));
        }

        $subscriptionType = $this->subscriptionTypeRepository->update($request->all(), $id);

        // Flash::success('Subscription Type updated successfully.');

        return redirect(route('subscriptionTypes.index'));
    }

    /**
     * Remove the specified SubscriptionType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subscriptionType = $this->subscriptionTypeRepository->find($id);

        if (empty($subscriptionType)) {
            // Flash::error('Subscription Type not found');

            return redirect(route('subscriptionTypes.index'));
        }

        $this->subscriptionTypeRepository->delete($id);

        // Flash::success('Subscription Type deleted successfully.');

        return redirect(route('subscriptionTypes.index'));
    }
}
