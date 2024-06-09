<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public $provider = null;
    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
        $this->provider->getAccessToken();
    }
    public function paypal(Request $request){
        // $provider = new PayPalClient;
        // $provider->setApiCredentials(config('paypal'));
        // $provider->getAccessToken();
        $response = $this->provider->createOrder([
            "intent" => "CAPTURE",

            "application_context" => [
                "return_url" => route('success'),
                "cancel_url" => route('cancel')
            ],

            "purchase_units" => [
                [
                    "amount" =>[
                        "currency_code" => "USD",
                        "value" => "100.00"
                    ]
                ]
            ]
        ]);

        // dd($response);

        if( isset($response['id']) && $response['id'] != null ){
            foreach($response['links'] as $link){
                if ($link['rel'] == "approve" ) {
                    // $session()->put('product_name', $request->product_name);
                    // $session()->put('quantity', $request->quantity);

                    session()->put('product_name', "QR Nostalx Service");
                    session()->put('quantity', 1);
                    return redirect()->away($link['href']);
                }
            }
        } else{
            return redirect()->route('cancel');
        }

    }

    public function success(Request $request){
        $response = $this->provider->capturePaymentOrder($request->token);
        if(isset($response['status']) && $response['status'] == "COMPLETED" ){
            $payment = new Payment;
            $payment->reference_id = $response['id'];
            $payment->product_name  = session()->get('product_name');
            $payment->quantity  = session()->get('quantity');
            $payment->amount  = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->currency  = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $payment->payer_name  = $response['payer']['name']['given_name'];
            $payment->payer_email  = $response['payer']['email_address'];
            $payment->status  = $response['status'];
            $payment->method  = "PayPal";
            $payment->save();


            unset($_SESSION['product_name']);
            unset($_SESSION['quantity']);

            return view('thank-you')->with('payment',$payment);
        }else if( isset($request) && $request->query(('token')) != null) {
            $referenceId = $request->query(('token'));
            $payment = Payment::firstWhere('reference_id',$referenceId);
dd($payment);
            // return redirect()->route('thank-you')->with('payment',$payment);
            return view('thank-you')->with('payment',$payment);

            // dd($request->query('token'));
        }
        // dd($response);
    }

    public function cancel(){

    }


    // private $apiContext;
    // private $payPalConfig;

    // public function __construct()
    // {
    //     $this->payPalConfig = Config::get('paypal');

    //     $this->apiContext = new ApiContext(
    //         new OAuthTokenCredential(
    //             $this->payPalConfig['client_id'],
    //             $this->payPalConfig['secret']
    //         )
    //     );

    //     $this->apiContext->setConfig($this->payPalConfig['settings']);
    // }

    // // ...

    // public function payWithPayPal()
    // {
    //     $payer = new Payer();
    //     $payer->setPaymentMethod('paypal');

    //     $amount = new Amount();
    //     $amount->setTotal('3.99');
    //     $amount->setCurrency('USD');

    //     $transaction = new Transaction();
    //     $transaction->setAmount($amount);
    //     $transaction->setDescription('Nostalx QR Service');

    //     $callbackUrl = url('/paypal/status');

    //     $redirectUrls = new RedirectUrls();
    //     $redirectUrls->setReturnUrl($callbackUrl)
    //         ->setCancelUrl($callbackUrl);

    //     $payment = new Payment();
    //     $payment->setIntent('sale')
    //         ->setPayer($payer)
    //         ->setTransactions(array($transaction))
    //         ->setRedirectUrls($redirectUrls);

    //     try {
    //         // dd($this->apiContext);
    //         $payment->create($this->payPalConfig);
    //         dd($payment);
    //         return redirect()->away($payment->getApprovalLink());
    //     } catch (PayPalConnectionException $ex) {
    //         echo $ex->getData();
    //     }
    // }

    // public function payPalStatus(Request $request)
    // {
    //     $paymentId = $request->input('paymentId');
    //     $payerId = $request->input('PayerID');
    //     $token = $request->input('token');

    //     if (!$paymentId || !$payerId || !$token) {
    //         $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
    //         return redirect('/paypal/failed')->with(compact('status'));
    //     }

    //     $payment = Payment::get($paymentId, $this->apiContext);

    //     $execution = new PaymentExecution();
    //     $execution->setPayerId($payerId);

    //     /** Execute the payment **/
    //     $result = $payment->execute($execution, $this->apiContext);

    //     if ($result->getState() === 'approved') {
    //         $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
    //         return redirect('/results')->with(compact('status'));
    //     }

    //     $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
    //     return redirect('/results')->with(compact('status'));
    // }
}
