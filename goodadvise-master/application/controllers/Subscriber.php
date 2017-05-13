<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Subscriber extends CI_Controller {

	 function __construct() {
        parent::__construct();
         $this->load->model('subscriber_model');
       
 $this->load->library('loadadminview');
                   
                   
                 
               
}
function getsubscriberfordatatable(){
    $this->subscriber_model->getallsubscriberlistfordatatable( );
}
function index(){
     if (isset($_SESSION['superadmin_sess']) && $_SESSION['superadmin_sess']=='backendsuperadmin') {
		
                $users['menuactiveornot']= 'subscriber';
       
          $this->loadadminview->loaderfirst('admin/subscriber', $users);
              }else 
              {
                  session_destroy();
                  $this->load->view('admin/login_page');
              }
}

         }