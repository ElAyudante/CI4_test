<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 


// Error controller
// This controller is used to manage the errors (404)
class Errors extends CI_Controller 
{
        public function __construct() 
    {
        parent::__construct(); 
    }
    // Main controller for the contact form
    public function index()
    {
        // Create your custom controller

        // Display page
        echo view('templates/header');
        echo view('errors/error404');
        echo view('templates/footer');
    }
}
