<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Subscription extends CI_Controller {

	 function __construct() {
        parent::__construct();
         $this->load->model('subscription_model');
       
 $this->load->library('loadadminview');
                   
                   
                 
               
}


public function getsubscriptionfordatatable(){
    $this->subscription_model->getallsubscriptionlistfordatatable();
   
}

	public function index()
	{
              if (isset($_SESSION['superadmin_sess']) && $_SESSION['superadmin_sess']=='backendsuperadmin') {
		
                $users['menuactiveornot']= 'subscription';
       
          $this->loadadminview->loaderfirst('admin/subscription', $users);
              }else 
              {
                  session_destroy();
                  $this->load->view('admin/login_page');
              }
                  // $this->loadadminview->loaderfirst('admin/login_page', $users);
	}
        
}
