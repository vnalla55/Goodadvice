<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Contentdelivery extends CI_Controller {

	 function __construct() {
        parent::__construct();
         $this->load->model('contentdelivery_model');
       
 $this->load->library('loadadminview');
                   
                   
                 
               
}
function getcontentdeliveryfordatatable(){
    $this->contentdelivery_model->getallcontentdeliverylistfordatatable( );
}
function index(){
     if (isset($_SESSION['superadmin_sess']) && $_SESSION['superadmin_sess']=='backendsuperadmin') {
		
                $users['menuactiveornot']= 'contentdelivery';
       
          $this->loadadminview->loaderfirst('admin/contentdelivery', $users);
              }else 
              {
                  session_destroy();
                  $this->load->view('admin/login_page');
              }
}

         }