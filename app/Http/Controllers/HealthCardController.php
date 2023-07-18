<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHealthCardRequest;
use App\Http\Requests\UpdateHealthCardRequest;
use App\Repositories\HealthCardRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class HealthCardController extends AppBaseController
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
        $healthCards = $this->healthCardRepository->all();

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
        $input = $request->all();

        $healthCard = $this->healthCardRepository->create($input);

        Flash::success('Health Card saved successfully.');

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
        $healthCard = $this->healthCardRepository->find($id);

        if (empty($healthCard)) {
            Flash::error('Health Card not found');

            return redirect(route('healthCards.index'));
        }

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
        $healthCard = $this->healthCardRepository->find($id);

        if (empty($healthCard)) {
            Flash::error('Health Card not found');

            return redirect(route('healthCards.index'));
        }

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
        $healthCard = $this->healthCardRepository->find($id);

        if (empty($healthCard)) {
            Flash::error('Health Card not found');

            return redirect(route('healthCards.index'));
        }

        $healthCard = $this->healthCardRepository->update($request->all(), $id);

        Flash::success('Health Card updated successfully.');

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
        $healthCard = $this->healthCardRepository->find($id);

        if (empty($healthCard)) {
            Flash::error('Health Card not found');

            return redirect(route('healthCards.index'));
        }

        $this->healthCardRepository->delete($id);

        Flash::success('Health Card deleted successfully.');

        return redirect(route('healthCards.index'));
    }
}
