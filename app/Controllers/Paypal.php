<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 

 
class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
         
        // Load paypal library 
        $this->load->library('paypal_lib'); 
         
        // Load product model 
        $this->load->model('product'); 
         
        // Load payment model 
        $this->load->model('payment'); 
     } 
      
    function success(){ 
        // Get the transaction data 
        $paypalInfo = $this->input->get(); 
         
        $productData = $paymentData = array(); 
        if(!empty($paypalInfo['item_number']) && !empty($paypalInfo['tx']) && !empty($paypalInfo['amt']) && !empty($paypalInfo['cc']) && !empty($paypalInfo['st'])){ 
            $item_name = $paypalInfo['item_name']; 
            $item_number = $paypalInfo['item_number']; 
            $txn_id = $paypalInfo["tx"]; 
            $payment_amt = $paypalInfo["amt"]; 
            $currency_code = $paypalInfo["cc"]; 
            $status = $paypalInfo["st"]; 
             
            // Get product info from the database 
            $productData = $this->product->getRows($item_number); 
             
            // Check if transaction data exists with the same TXN ID 
            $paymentData = $this->payment->getPayment(array('txn_id' => $txn_id)); 
        } 
         
        // Pass the transaction data to view 
        $data['product'] = $productData; 
        $data['payment'] = $paymentData; 
        echo view('templates/header');
        echo view('paypal/success', $data); 
        echo view('templates/footer');
    } 
      
     function cancel(){ 
        // Load payment failed view 
        echo view('templates/header');
        echo view('paypal/cancel');
        echo view('templates/footer'); 
     } 
      
     function ipn(){ 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post(); 
        

        // Insert the transaction data in the database 
        $data['user_id']    = $paypalInfo["custom"]; 
        $data['product_id']    = $paypalInfo["item_number"]; 
        $data['txn_id']    = $paypalInfo["txn_id"]; 
        $data['payment_gross']    = $paypalInfo["payment_gross"]; 
        $data['currency_code']    = $paypalInfo["mc_currency"]; 
        $data['payer_email']    = $paypalInfo["payer_email"]; 
        $data['payment_status'] = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;
        $result = $this->paypal_lib->curlPost($paypalURL, $paypalInfo);

        if(eregi("VERIFIED", $result)){

            $this->product->insertTransaction($data);
        } 
    } 
        
} 
