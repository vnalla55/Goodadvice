<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class Package extends CI_Controller {

	 function __construct() {
        parent::__construct();
         $this->load->model('package_model');
       
 $this->load->library('loadadminview');
 $this->load->library('quartz');
                   
                   
                 
               
}
public function editpackagecontent($packagecontent_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                    // $this->load->model('admin_model');
			$data['packagecontent_details'] = $this->package_model->getpackagecontentinfobyid($packagecontent_id);
			foreach($data['packagecontent_details'] as $row)
			{
                           $packagecontent_details = array
				(
				'subscription_package_id' => $row['subscription_package_id'],
				'subscription_package_content_title' => $row['subscription_package_content_title'],
				'subscription_package_content' => $row['subscription_package_content'],				
                               
                            
				
				);  
                     
			}
			echo json_encode($packagecontent_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
public function editpackage($package_id)
	{
       
	if(!$this->input->is_ajax_request())
		{
			redirect(404);
		}
		else
		{
                    // $this->load->model('admin_model');
			$data['package_details'] = $this->package_model->getpackageinfobyid($package_id);
			foreach($data['package_details'] as $row)
			{
                           $package_details = array
				(
				'subscription_package_id' => $row['subscription_package_id'],
				'subscription_package_name' => $row['subscription_package_name'],
				'service_id' => $row['service_id'],				
                                'secret' => $row['secret'],
                               'package_description' => $row['package_description'],
                               'no_of_contents' => $row['no_of_contents'],
                               'package_icon' => $row['package_icon'],
                            'frequency' => $row['frequency'],	
                             'time' => $row['time'],
                            'day_of_week' => $row['day_of_week'],	
                                'day_of_month' => $row['day_of_month'],
                            
				
				);  
                     
			}
			echo json_encode($package_details);
		}
/* 	$this->load->view('lims_header');
	$this->load->view('lims_navigation');
	$this->load->view('serology/lims_edit_serology_by_id_form',$data); */
	}
        public function getpackagecontentfordatatable(){
              $this->package_model->getallpackagecontentlistfordatatable( );
        }
public function getpackagefordatatable(){
    $this->package_model->getallpackagelistfordatatable( );
   
}
public function deletepackagecontent($packagecontent_id)
	{
      
                    // $this->load->model('admin_model');
                       $okornot= $this->package_model->deletepackagecontent_M($packagecontent_id);
			
                       if($okornot==1)
                       echo 'Successfully Deleted';
                     else
                         echo 'Error.Please try again';

			
				
	}
 public function deletepackage($package_id)
	{
      
                    // $this->load->model('admin_model');
                       $okornot= $this->package_model->deletepackage_M($package_id);
			
                       if($okornot==1){
                             $this->quartz->removeJob($package_id);
                            echo 'Successfully Deleted';
                       }
                      
                     else
                         echo 'Error.Please try again';

			
				
	}
        public function addpackagecontent()
	{
              $noofcontentinpackagetable=$this->package_model->getthecountofnoofcontentsforagivenpackage();
              $noofcontentreachedincontenttable=$this->package_model->getthecountreachedforagivenpackageincontenttable();
       if($noofcontentinpackagetable  > $noofcontentreachedincontenttable)
                  {
                      $okornot=$this->package_model->addpackagecontentinfo();
                        if($okornot==1)
                       echo 'Successfully Added';
                     else
                         echo 'Error.Please try again';
                  }
                  else
                     echo 'The number of contents defined in package has reached its limit. Please increase the limit first to further add the content';
                    // $this->load->model('admin_model');
                       
			
			
				
	}
public function addpackage()
	{
      
                    // $this->load->model('admin_model');
                        $packageid=$this->package_model->addpackageinfo();
                        if($packageid!=0){
                            $time=array();
                            if($this->input->post('frequency')=='daily')
                            $time =array ("min" => explode(':',$this->input->post('time'))[1], "hour" => explode(':',$this->input->post('time'))[0], "day" => "*", "month" => "*", "week" => "*");
                             else if($this->input->post('frequency')=='weekly'){
                                 

                    $day_of_week = date('N', strtotime($this->input->post('day_of_week')));


                                  $time =array ("min" => explode(':',$this->input->post('time'))[1], "hour" => explode(':',$this->input->post('time'))[0], "day" => "*", "month" => "*", "week" =>$day_of_week );
                             }
                             else if($this->input->post('frequency')=='monthly'){
                                $time =array ("min" => explode(':',$this->input->post('time'))[1], "hour" => explode(':',$this->input->post('time'))[0], "day" => $this->input->post('day_of_month'), "month" => "*", "week" =>"*" );
                           
                             }
                            $this->quartz->addJob($time, $packageid);
                            echo 'Successfully Added';
                        }
                     
                     else
                      echo 'Error.Please try again';
			
			
				
	}
        public function updatepackagecontent($packagecontent_id)
	{
      
                    // $this->load->model('admin_model');
                        $okornot=$this->package_model->updatepackagecontentinfo($packagecontent_id);
                        if($okornot==1){
                             
                        echo 'Successfully Updated';
                        
                        }
                     else
                         echo 'Error.Please try again';
			
			
				
	}
public function updatepackage($package_id)
	{
      
                    // $this->load->model('admin_model');
                        $okornot=$this->package_model->updatepackageinfo($package_id);
                        if($okornot==1){
                             $this->quartz->removeJob($package_id);
                            $time=array();
                            if($this->input->post('frequency')=='daily')
                            $time =array ("min" => explode(':',$this->input->post('time'))[1], "hour" => explode(':',$this->input->post('time'))[0], "day" => "*", "month" => "*", "week" => "*");
                             else if($this->input->post('frequency')=='weekly'){
                                 

                    $day_of_week = date('N', strtotime($this->input->post('day_of_week')));


                                  $time =array ("min" => explode(':',$this->input->post('time'))[1], "hour" => explode(':',$this->input->post('time'))[0], "day" => "*", "month" => "*", "week" =>$day_of_week );
                             }
                             else if($this->input->post('frequency')=='monthly'){
                                $time =array ("min" => explode(':',$this->input->post('time'))[1], "hour" => explode(':',$this->input->post('time'))[0], "day" => $this->input->post('day_of_month'), "month" => "*", "week" =>"*" );
                           
                             }
                            $this->quartz->addJob($time, $package_id);
                        echo 'Successfully Updated';
                        
                        }
                     else
                         echo 'Error.Please try again';
			
			
				
	}
public function packagecontent()
	{
              if (isset($_SESSION['superadmin_sess']) && $_SESSION['superadmin_sess']=='backendsuperadmin') {
		
                $users['menuactiveornot']= 'packagecontent';
        $users['packageinfo']= $this->package_model->getPackageForPackageContent();
          $this->loadadminview->loaderfirst('admin/packagecontent', $users);
              }else 
              {
                  session_destroy();
                  $this->load->view('admin/login_page');
              }
                  // $this->loadadminview->loaderfirst('admin/login_page', $users);
	}
	public function index()
	{
              if (isset($_SESSION['superadmin_sess']) && $_SESSION['superadmin_sess']=='backendsuperadmin') {
		
                $users['menuactiveornot']= 'package';
       
          $this->loadadminview->loaderfirst('admin/package', $users);
              }else 
              {
                  session_destroy();
                  $this->load->view('admin/login_page');
              }
                  // $this->loadadminview->loaderfirst('admin/login_page', $users);
	}
        
}
