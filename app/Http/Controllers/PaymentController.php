<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Models\Subscription;
use App\Repositories\PaymentRepository;
use App\Repositories\SubscriptionRepository;
use App\Http\Controllers\AppBaseController;

use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Response;

class PaymentController extends Controller
{
    /** @var PaymentRepository $paymentRepository*/
    private $paymentRepository;
    /** @var SubscriptionRepository $subscriptionRepository*/
    private $subscriptionRepository;

    public function __construct(PaymentRepository $paymentRepo,SubscriptionRepository $subscriptionRepo)
    {
        $this->paymentRepository = $paymentRepo;
        $this->subscriptionRepository = $subscriptionRepo;
    }

    /**
     * Display a listing of the Payment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rol_names = array("administrator", "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_index_payment'], '');
            return redirect()->route('dashboard')->with('error', 'Usted no tiene permiso!');
        }
        $payments = $this->paymentRepository->all();

        $this->addAudit(Auth::user(), $this->typeAudit['access_index_payment'], '');
        return view('payments.index')
            ->with('payments', $payments);
    }

    /**
     * Show the form for creating a new Payment.
     *
     * @return Response
     */
    public function create()
    {
        $rol_names = array( "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_create_payment'], '');
            return redirect()->route('payments.index')->with('error', 'Usted no tiene permiso!');
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_create_payment'], '');
        return view('payments.create');
    }

    /**
     * Store a newly created Payment in storage.
     *
     * @param CreatePaymentRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentRequest $request)
    {
        $rol_names = array( "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_store_payment'], '');
            return redirect()->route('payments.index')->with('error', 'Usted no tiene permiso!');
        }

        $input = $request->all();
        $subscriptionId = $request['subscription_id'];
        $totalPrice = Subscription::find($subscriptionId)->total_amount;

        if ($request['amount'] > $totalPrice) {
            return redirect()->back()->withErrors(['amount' => 'El monto no puede ser mayor al precio de la suscripción']);
        }
        if ($request['amount'] = $totalPrice) {
            $this->subscriptionRepository->update(['state' => 'Pagado'], $subscriptionId);
        }
        else {
            $this->subscriptionRepository->update(['state' => 'Abonado'], $subscriptionId);
        }
        $this->subscriptionRepository->update(['total_amount' => $totalPrice - $request['amount']], $subscriptionId);

        $payment = $this->paymentRepository->create($input);
        $subscriptionId = $payment->subscription_id;
        $payments = Payment::where('subscription_id', $subscriptionId)->get();
       
        $data_new = json_encode($payment);

        $this->addAudit(Auth::user(), $this->typeAudit['access_store_payment'],'', $data_new);   

        return view('payments.index', ['payments' => $payments, 'subscriptionId' => $subscriptionId]);
    }

    /**
     * Display the specified Payment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rol_names = array("administrator", "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_show_payment'], '');
            return redirect()->route('payments.index')->with('error', 'Usted no tiene permiso!');
        }

        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {

            return redirect(route('payments.index'));
        }
        
        $this->addAudit(Auth::user(), $this->typeAudit['access_show_payment'], '');
        return view('payments.show')->with('payment', $payment);
    }

    /**
     * Show the form for editing the specified Payment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rol_names = array( "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_edit_payment'], '');
            return redirect()->route('payments.index')->with('error', 'Usted no tiene permiso!');
        }
        $payment = $this->paymentRepository->find($id);
        $subscriptionId = $payment->subscription_id;

        if (empty($payment)) {

            return redirect(route('payments.index'));
        }

        $this->addAudit(Auth::user(), $this->typeAudit['access_edit_payment'], '');

        return view('payments.edit')->with('payment', $payment)->with('subscriptionId', $subscriptionId);
    }

    /**
     * Update the specified Payment in storage.
     *
     * @param int $id
     * @param UpdatePaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentRequest $request)
    {
        $rol_names = array( "operator", "user");
        if (!Gate::allows('has_role', [$rol_names])) {
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_update_payment'], '');
            return redirect()->route('payments.index')->with('error', 'Usted no tiene permiso!');
        }

        $data_old = Payment::find($id);
        $data_old = $data_old->toJson();

        $payment = $this->paymentRepository->find($id);
        

        if (empty($payment)) {

            return redirect(route('payments.index'));
        }
        $subscriptionId = $request['subscription_id'];
        $totalPrice = Subscription::find($subscriptionId)->subscriptionType()->first()->price;
        if ($request['amount'] > $totalPrice) {
            return redirect()->back()->withErrors(['amount' => 'El monto no puede ser mayor al precio de la suscripción']);
        }
        if ($request['amount'] == $totalPrice) {
            $this->subscriptionRepository->update(['state' => 'Pagado'], $subscriptionId);
        }
        else {
            $this->subscriptionRepository->update(['state' => 'Abonado'], $subscriptionId);
        }
        $this->subscriptionRepository->update(['total_amount' => $totalPrice - $request['amount']], $subscriptionId);

        $payment = $this->paymentRepository->update($request->all(), $id);

        $subscriptionId = $payment->subscription_id;
        $payments = Payment::where('subscription_id', $subscriptionId)->get();

        $data_new = json_encode($payment);

        $this->addAudit(Auth::user(), $this->typeAudit['access_update_payment'], $data_old, $data_new);    
       
        return view('payments.index', ['payments' => $payments, 'subscriptionId' => $subscriptionId]);
    }

    /**
     * Remove the specified Payment from storage.
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
            $this->addAudit(Auth::user(), $this->typeAudit['not_access_destroy_payment'], '');
            return redirect()->route('payments.index')->with('error', 'Usted no tiene permiso!');
        }
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {

            return redirect(route('payments.index'));
        }

        $this->paymentRepository->delete($id);

        $subscriptionId = $payment->subscription_id;
        $payments = Payment::where('subscription_id', $subscriptionId)->get();

        $data_old = json_encode($payment);
        $this->addAudit(Auth::user(), $this->typeAudit['access_destroy_payment'], $data_old, '');
        return view('payments.index', ['payments' => $payments, 'subscriptionId' => $subscriptionId]);
    }

    public function getPaymentsBySubscriptionId($subscriptionId)
    {
        $payments = Payment::where('subscription_id', $subscriptionId)->get();
        return view('payments.index', ['payments' => $payments, 'subscriptionId' => $subscriptionId]);
    }
    public function createPaymentBySubscriptionId($subscriptionId)
    {
        return view('payments.create', ['subscriptionId' => $subscriptionId]);
    }

    public function getMasterDetail($id) {
        $response = [];
        $payment = $this->paymentRepository->find($id);
    
        // Obtener datos relacionados con la suscripción
        $response['payment'] = $payment;
        $response['subscription'] = $payment->subscription;
        $response['subscriptionType'] = $payment->subscription->subscriptionType;
        $response['user'] = $payment->subscription->user;
        return view('payments.master_detail', $response);
    }
    

    
}
