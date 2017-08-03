<?php

namespace App\Http\Controllers;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentCard;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;

use App\library\service;
use App\library\token;
use App\library\date;
use Redirect;
use Auth;
use Validator;

class DonateController extends Controller
{
  public function __construct() {
    $this->botDisallowed();
  }
  
  public function index() {

    if(empty(request()->for) || empty(request()->id)) {
      return $this->error('URL ไม่ถูกต้อง');
    }

    $for = null;
    switch (request()->for) {
      case 'charity':

        $data = Service::loadModel('Charity')->select('name','short_desc','thumbnail','has_reward')->find(request()->id);

        if(empty($data)) {
          return $this->error('ไม่พบมูลนิธินี้');
        }

        $for = 'มูลนิธิ';

        $this->setData('charity',$data);

        break;

      case 'project':
        
        $data = Service::loadModel('Project')
        ->select('id','charity_id','short_desc','thumbnail')
        ->where([
          ['id','=',request()->id],
          ['end_date','>',date('Y-m-d H:i:s')]
        ]);

        if(!$data->exists()) {
          return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
        }

        $for = 'โครงการ';

        $data = $data->first();

        $charity = Service::loadModel('Charity')->select('name','has_reward')->find($data->charity_id);

        $this->setData('charity',$charity);

        break;
      
      default:
        return Redirect::to('/');
        break;
    }

    $hours = array();
    $mins = array();

    for ($i=0; $i <= 23; $i++) { 

      if($i < 10) {
        $hours['0'.$i] = $i;
      }else{
        $hours[$i] = $i;
      }

    }

    for ($i=0; $i <= 59; $i++) {

      if($i < 10) {
        $mins['0'.$i] = '0'.$i;
      }else{
        $mins[$i] = $i;
      }
      
    }

    $this->setData('hours',$hours);
    $this->setData('mins',$mins);

    $provinces = Service::loadFieldData('Province',array(
      'key' =>'id',
      'field' => 'name',
      'order' => array(
        array('top','ASC'),
        array('id','ASC')
      )
    ));

    $this->setData('provinces', $provinces);

    // SET DATA
    $this->setData('name',$data->name);
    $this->setData('id',request()->id);
    $this->setData('for',request()->for);

    // SET META
    $this->setMeta('title','บริจาคให้กับ'.$for.' '.$data->name.' — CharityTH');
    $this->setMeta('description',$data->short_desc);
    $this->setMeta('image',$data->thumbnail);

    return $this->view('page.donate.index');

  }

  public function donationSubmit() {

    if(empty(request()->for) || empty(request()->id)) {
      return $this->error('URL ไม่ถูกต้อง');
    }

    $donation = Service::loadModel('Donation');

    if(isset(request()->reward_chkbox) && request()->reward_chkbox) {
      $validation = $donation->validationWithAddress;
    }else{
      $validation = $donation->validation;
    }

    $validator = Validator::make(request()->all(), $validation['rules'],$validation['messages']);
    
    if($validator->fails()) {
      return Redirect::back()->withErrors($validator->getMessageBag())->withInput(request()->all());
    }

    if(isset(request()->reward_chkbox) && request()->reward_chkbox) {

      $donation->get_reward = 1;

      $donation->reward = json_encode(array(
        'selected' => 'shirt',
        'option' => array(
          'size' => request()->reward_option
        )
      ));

      $donation->shipping_address = json_encode(array(
        'receiver_name' => trim(request()->receiver_name),
        'tel_no' => request()->tel_no,
        'email' => trim(request()->email),
        'address_no' => request()->address_no,
        'building' => request()->building,
        'floor' => request()->floor,
        'squad' => request()->squad,
        'road' => request()->road,
        'alley' => request()->alley,
        'province' => Service::loadModel('Province')->find(request()->province)->name,
        'district' => Service::loadModel('District')->find(request()->district)->name,
        'sub_district' => request()->sub_district,
        'post_code' => request()->post_code
      ));

    }

    switch (request()->for) {
      case 'charity':

        if(empty(Service::loadModel('Charity')->select('name')->find(request()->id))) {
          return $this->error('ไม่พบมูลนิธินี้');
        }

        $donation->model = 'Charity';
        $donation->model_id = request()->id;

        break;

      case 'project':

        $project = Service::loadModel('Project')
        ->select('id')
        ->where([
          ['id','=',request()->id],
          ['end_date','>',date('Y-m-d H:i:s')]
        ]);

        if(!$project->exists()) {
          return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
        }

        $donation->model = 'Project';
        $donation->model_id = request()->id;

        break;
      
      default:
        return Redirect::to('/');
        break;
    }

    $donation->transfer_date = request()->date.' '.request()->time_hour.':'.request()->time_min.':00';
    $donation->amount = request()->amount;
    $donation->code = strtoupper(date('Yd').'-'.Token::generateSecureKey(8));

    if(Auth::check()) {
      $donation->user_id = Auth::user()->id;
    }elseif(!empty(request()->name)){
      $donation->guest_name = trim(request()->name);      
    }

    if(isset(request()->unidentified) && request()->unidentified) {
      $donation->unidentified = 1;
    }

    $donation->donate_via_id = 1;

    if($donation->save()) {

      // if(Auth::check()) {}

      // If logged in and address is empty
      // add address to user address field
      // $user = Service::loadModel('User')->find();
      // $user->shipping_address = $donation->address;
      // $user->save();

      return Redirect::to('donation/'.$donation->code);

    }

    return Redirect::to('donate');

  }

  // public function complete($code) {

  //   if(empty($code)) {
  //     return $this->error('URL ไม่ถูกต้อง');
  //   }

  //   $donation = Service::loadModel('Donation')->where('code','like',$code);

  //   if(!$donation->exists()) {
  //     return $this->error('ไม่พบการบริจาคที่คุณกำลังค้นหา');
  //   }

  //   $donation = $donation->first();

  //   $data = Service::loadModel($donation->model)->find($donation->model_id);

  //   switch ($donation->model) {
  //     case 'Charity':

  //       if(empty($data)) {
  //         return $this->error('ไม่พบมูลนิธินี้');
  //       }

  //       $this->setData('for','มูลนิธิ');
  //       $this->setData('charityName',$data->name);
  //       $this->setData('charityLogo',$data->logo);

  //       break;

  //     case 'Project':

  //       if(empty($data)) {
  //         return $this->error('ไม่พบโครงการนี้หรือการเปิดรับบริจาคโครงการนี้สิ้นสุดแล้ว');
  //       }

  //       $charity = Service::loadModel('Charity')->select('name')->find($data->charity_id);

  //       $this->setData('for','โครงการ');
  //       $this->setData('charityName',$charity->name);
  //       $this->setData('charityLogo',$charity->logo);

  //       break;
      
  //     default:
  //       return Redirect::to('/');
  //       break;
  //   }

  //   // SET LIB
  //   $this->setData('dateLib',new Date);

  //   // SET DATA
  //   $this->setData('id',$data->id);
  //   $this->setData('name',$data->name);
  //   $this->setData('code',$code);
  //   $this->setData('donation',$donation);

  //   // SET META
  //   $this->setMeta('title','การบริจาค — CharityTH');

  //   return $this->view('page.donate.complete');
  // }

  public function payment() {

    $apiContext = new \PayPal\Rest\ApiContext(
      new \PayPal\Auth\OAuthTokenCredential(
          'AY7dF37aTrnTqk8SR_NBDfFUg7-QpZcN8la_1GajXLAG8CPSJY57UtF_KzDVngKtXFq5Sf0pDKTkPait',     // ClientID
          'EOTAD6imF2dvey05be84JrASR7K9XxXiBcvGbAfgpeHs0kduIuR4BVxdj2Y5lWqt4VerjyWzFonoy_UI'      // ClientSecret
      )
    );

    $card = new \PayPal\Api\PaymentCard();
    $card->setType("visa")
        ->setNumber("4032032334484554")
        ->setExpireMonth("09")
        ->setExpireYear("2022")
        ->setCvv2("123")
        ->setFirstName("Buyer")
        ->setLastName("Test")
        ->setBillingCountry("US");

    $fi = new FundingInstrument();
    $fi->setPaymentCard($card);

    $payer = new Payer();
    $payer->setPaymentMethod("credit_card")
        ->setFundingInstruments(array($fi));

    $item1 = new Item();
    $item1->setName('Ground Coffee 40 oz')
        ->setDescription('Ground Coffee 40 oz')
        ->setCurrency('USD')
        ->setQuantity(1)
        // ->setTax(0.3)
        ->setPrice(1);

    $itemList = new ItemList();
    $itemList->setItems(array($item1));

    // $details = new Details();
    // $details->setShipping(1.2)
    //     ->setTax(1.3)
    //     ->setSubtotal(17.5);

    $amount = new Amount();
    $amount->setCurrency("USD")
        ->setTotal(1);
        // ->setDetails($details);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Payment description xxxx")
        ->setInvoiceNumber(uniqid());

    $payment = new Payment();
    $payment->setIntent("sale")
        ->setPayer($payer)
        ->setTransactions(array($transaction));

    $request = clone $payment;

    try {
        $payment->create($apiContext);
    } catch (Exception $ex) {
        // ResultPrinter::printError('Create Payment Using Credit Card. If 500 Exception, try creating a new Credit Card using <a href="https://www.paypal-knowledge.com/infocenter/index?page=content&widgetview=true&id=FAQ1413">Step 4, on this link</a>, and using it.', 'Payment', null, $request, $ex);
      dd('error');
        exit(1);
    }
    // ResultPrinter::printResult('Create Payment Using Credit Card', 'Payment', $payment->getId(), $request, $payment);

    dd($payment);

  }

  public function paypalPayment() {

    $apiContext = new \PayPal\Rest\ApiContext(
      new \PayPal\Auth\OAuthTokenCredential(
          'AY7dF37aTrnTqk8SR_NBDfFUg7-QpZcN8la_1GajXLAG8CPSJY57UtF_KzDVngKtXFq5Sf0pDKTkPait',     // ClientID
          'EOTAD6imF2dvey05be84JrASR7K9XxXiBcvGbAfgpeHs0kduIuR4BVxdj2Y5lWqt4VerjyWzFonoy_UI'      // ClientSecret
      )
    );

    // ### Payer
    // A resource representing a Payer that funds a payment
    // For paypal account payments, set payment method
    // to 'paypal'.
    $payer = new Payer();
    $payer->setPaymentMethod("paypal");
    // ### Itemized information
    // (Optional) Lets you specify item wise
    // information
    $item1 = new Item();
    $item1->setName('Ground Coffee 40 oz')
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setSku("123123") // Similar to `item_number` in Classic API
        ->setPrice(7.5);
    $itemList = new ItemList();
    $itemList->setItems(array($item1));
    // ### Additional payment details
    // Use this optional field to set additional
    // payment information such as tax, shipping
    // charges etc.
    $details = new Details();
    $details->setShipping(1.2)
        ->setTax(1.3)
        ->setSubtotal(17.50);
    // ### Amount
    // Lets you specify a payment amount.
    // You can also specify additional details
    // such as shipping, tax.
    $amount = new Amount();
    $amount->setCurrency("USD")
        ->setTotal(20)
        ->setDetails($details);
    // ### Transaction
    // A transaction defines the contract of a
    // payment - what is the payment for and who
    // is fulfilling it. 
    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Payment description")
        ->setInvoiceNumber(uniqid());
    // ### Redirect urls
    // Set the urls that the buyer must be redirected to after 
    // payment approval/ cancellation.
    $baseUrl = \Request::url();
    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl("$baseUrl/ExecutePayment.php?success=true")
        ->setCancelUrl("$baseUrl/ExecutePayment.php?success=false");
    // ### Payment
    // A Payment Resource; create one using
    // the above types and intent set to 'sale'
    $payment = new Payment();
    $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));
    // For Sample Purposes Only.
    $request = clone $payment;
    // ### Create Payment
    // Create a payment by calling the 'create' method
    // passing it a valid apiContext.
    // (See bootstrap.php for more on `ApiContext`)
    // The return object contains the state and the
    // url to which the buyer must be redirected to
    // for payment approval
    try {
        $payment->create($apiContext);
    } catch (Exception $ex) {
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        // ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
        exit(1);
    }
    // ### Get redirect url
    // The API response provides the url that you must redirect
    // the buyer to. Retrieve the url from the $payment->getApprovalLink()
    // method
    $approvalUrl = $payment->getApprovalLink();
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    echo 'Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='.$approvalUrl.' >$approvalUrl</a>';
    exit;

  }

  public function listPayment() {

    $apiContext = new \PayPal\Rest\ApiContext(
      new \PayPal\Auth\OAuthTokenCredential(
          'AY7dF37aTrnTqk8SR_NBDfFUg7-QpZcN8la_1GajXLAG8CPSJY57UtF_KzDVngKtXFq5Sf0pDKTkPait',     // ClientID
          'EOTAD6imF2dvey05be84JrASR7K9XxXiBcvGbAfgpeHs0kduIuR4BVxdj2Y5lWqt4VerjyWzFonoy_UI'      // ClientSecret
      )
    );

    try {
        $params = array('count' => 10, 'start_index' => 0);
        $payments = Payment::all($params, $apiContext);
    } catch (Exception $ex) {
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        dd('error');
        exit(1);
    }

    dd($payments);

  }

}
