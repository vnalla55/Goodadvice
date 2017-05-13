<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Admin extends CI_Controller {

	 function __construct() {
        parent::__construct();
         $this->load->model('admin_model');
       
 $this->load->library('loadadminview');
                   
                   
                 
               
}
function password(){
    if (isset($_SESSION['superadmin_sess']) && $_SESSION['superadmin_sess']=='backendsuperadmin') {
		
                $users['pagetitle'] = 'pagetitle';
      $users['menuactiveornot'] = 'changepassword';
     
    
     $this->loadadminview->loaderfirst('admin/changepassword', $users);
              }else 
              {
                  session_destroy();
                  $this->load->view('admin/login_page');
              }
}

 function changepassword() {
        
       
       $this->admin_model->changepassword_M();

        // $param['error_message']="Invalid username or password";
        //$this->load->view('admin_login', $param);
    }

public function dashboard(){
     if (isset($_SESSION['superadmin_sess']) && $_SESSION['superadmin_sess']=='backendsuperadmin') {
		
                $users['pagetitle'] = 'pagetitle';
      $users['menuactiveornot'] = 'dashboard';
       $users['totalsubscriptions'] =$this->admin_model->gettotalsubscriptions( );
       $users['totalsentsms'] =$this->admin_model->gettotalsentsms( );
        $users['totaldeliveredsms'] =$this->admin_model->gettotaldeliveredsms( );
          $users['totalfailedsms'] =$this->admin_model->gettotalfailedsms( );
         $users['totalpackage'] =$this->admin_model->gettotalpackage( );
          $users['totalsmscontent'] =$this->admin_model->gettotalpackagecontent( );
    
     $this->loadadminview->loaderfirst('admin/dashboard', $users);
              }else 
              {
                  session_destroy();
                  $this->load->view('admin/login_page');
              }
    
}
	public function index()
	{
              if (isset($_SESSION['superadmin_sess']) && $_SESSION['superadmin_sess']=='backendsuperadmin') {
                  
		$this->dashboard();
              }else 
              {
                  $this->load->view('admin/login_page');
              }
                  // $this->loadadminview->loaderfirst('admin/login_page', $users);
	}
        function logOut(){
             session_destroy();
              redirect(base_url() . 'admin');
             
        }
         function adminLoginValidate() {


      
        if($this->admin_model->adminLoginValidate_M()){
            
          $_SESSION['superadmin_sess']='backendsuperadmin';    
           $_SESSION['superadmin_name']=$this->input->post('username');    
         redirect(base_url() . 'admin/dashboard');
       
        }
        
        else{
           session_destroy();
                $param['error_message'] = "Invalid username or password";
                $this->load->view('admin/login_page', $param); 
        }
      
    }
}
