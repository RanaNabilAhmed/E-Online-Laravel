<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as Input;
use Illuminate\Support\Facades\Redirect;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Plan;
use PayPal\Api\Item;
use PayPal\Api\Itemlist;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PaymentExecution;
use PayPal\Api\PayerInfo;
use Carbon\Carbon;
use Session;
use Auth;
use URL;
use App\Order;
use App\OrderDetail;
use Syscover\ShoppingCart\Facades\CartProvider;



class PaymentController extends Controller
{
    public function __construct(){
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request){
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
            $item_1 = new Item();
            $item_1->setName('Item 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); 
            /** unit price **/$item_list = new ItemList();
            $item_list->setItems(array($item_1));$amount = new Amount();
            $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));$transaction = new Transaction();
             $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');$redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('/execute')) /** Specify return URL **/
            ->setCancelUrl(URL::route('/execute'));$payment = new Payment();
            $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
            try {$payment->create($this->_api_context);} 
            catch (\PayPal\Exception\PPConnectionException $ex) 
            {if (\Config::get('app.debug')) 
                {\Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');} 
            else {\Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');}}
            foreach ($payment->getLinks() as $link) {if ($link->getRel() == 'approval_url') {$redirect_url = $link->getHref(); break;}}/** add payment ID to session **/
            Session::put('paypal_payment_id', $payment->getId());
            if (isset($redirect_url)) {/** redirect to paypal **/
            return Redirect::away($redirect_url);}\
            Session::put('error', 'Unknown error occurred');
            return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus(){
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');/** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) 
        {\Session::put('error', 'Payment failed');
            return Redirect::route('/execute');}
            $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));/**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {

        $user = Auth::User();
        $order = new Order();
        $cart = CartProvider::instance()->getCartItems();
        $order->user_id = $user->id;
        $order->total_amount = CartProvider::instance()->total;
        $order->time = new Carbon();
        $order->pay_status = 0;
        $order->save();
        foreach ($cart as $value){
        $orderdetail = new orderdetail();
        $orderdetail->order_id = $order->id;
        $orderdetail->product_id = $value->id;
        $orderdetail->price = $value->price;
        $orderdetail->quantity = $value->getQuantity();
        $orderdetail->product_name = $value->name;
        $orderdetail->save();
        }
        \Session::put('success', 'Payment success');
            return Redirect('/cart')->with( Session::flash('message', 'Order Has Been Placed Successfully!!!'),CartProvider::instance()->destroy());   
    }
    
            \Session::put('error', 'Payment failed');
            return Redirect::route('/confirmation');
    }
}
