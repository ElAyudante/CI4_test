<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 


  
class Email extends CI_Controller {
  
     public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->config('email');
            $this->load->library('email');
        }
  
  
    public function index()
    {
        echo view('pages/email_view');
    }
    public function send_mail()
    {
        $this->email->from('your@example.com', 'Your Name');
        $this->email->to('someone@example.com');
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
 
 
        if($this->email->send()){
            echo view('templates/header');
            echo view('pages/email_view', $data);
            echo view('templates/footer');

        }
        else {
            echo $this->email->print_debugger();
        }
 
    }

    public function email_data() {

        $this->load->database();
        $this->load->model('Email_model');

        $result['data']=$this->Email_model->display_records();
    }
}
