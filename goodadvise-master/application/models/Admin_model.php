<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class admin_model extends CI_Model{
     function changepassword_M() {

 
    $username=$_SESSION['superadmin_name'];
    
   
      
          $sql = "SELECT COALESCE(count(*),0) as thecount from super_admin where username = '".$username."' and password = '".md5($this->input->post('password'))."'";
  $result = $this->db->query($sql);
   //echo $this->db->last_query();
        $row=$result->row();
        //echo $row->theticketcount;
        
       
        
        if ($row->thecount == 1 ) {


            $new_member_insert_data = array(
               
                'password' => md5($this->input->post('password1')),
            );
            $this->db->where('username', $username);
              $insert = $this->db->update('super_admin', $new_member_insert_data);
           
            if ($insert) {
                //return TRUE;

                echo json_encode(array('status' => 1, 'message' => 'Password successfully changed'));


                //$this->load->view('userprofile');
            }
        } else {
            echo json_encode(array('status' => 2, 'message' =>'Incorrect password. Try again'));
        }
}
    function gettotalfailedsms(){
        $sql = "SELECT COALESCE(count(*),0) as totalfailedsms from subscription_sent_details where sent_status='Failed'";
   $result = $this->db->query($sql);
   //echo $this->db->last_query();
        $row=$result->row();
        //echo $row->theticketcount;
        
       return $row->totalfailedsms;
    }
     function gettotalsentsms(){
        $sql = "SELECT COALESCE(count(*),0) as totalsentsms from subscription_sent_details";
   $result = $this->db->query($sql);
   //echo $this->db->last_query();
        $row=$result->row();
        //echo $row->theticketcount;
        
       return $row->totalsentsms;
    }
    function gettotaldeliveredsms(){
        $sql = "SELECT COALESCE(count(*),0) as totaldeliveredsms from subscription_sent_details where sent_status='Delivered'";
   $result = $this->db->query($sql);
   //echo $this->db->last_query();
        $row=$result->row();
        //echo $row->theticketcount;
        
       return $row->totaldeliveredsms;
    }
    function gettotalpackagecontent(){
        $sql = "SELECT COALESCE(count(*),0) as totalpackagecontent from subscription_package_content";
   $result = $this->db->query($sql);
   //echo $this->db->last_query();
        $row=$result->row();
        //echo $row->theticketcount;
        
       return $row->totalpackagecontent;
    }
    function gettotalpackage(){
        $sql = "SELECT COALESCE(count(*),0) as totalpackage from subscription_package";
   $result = $this->db->query($sql);
   //echo $this->db->last_query();
        $row=$result->row();
        //echo $row->theticketcount;
        
       return $row->totalpackage;
    }
    function gettotalsubscriptions(){
        $sql = "SELECT COALESCE(count(*),0) as totalsubscription from subscriber_subscription_link";
   $result = $this->db->query($sql);
   //echo $this->db->last_query();
        $row=$result->row();
        //echo $row->theticketcount;
        
       return $row->totalsubscription;
    }
    function adminLoginValidate_M() {
       
        $query='';
        if ($this->input->post('username') && $this->input->post('password')) {
            
            
            $sql = "SELECT COALESCE(count(*),0) as theticketcount from super_admin where username = '".$this->input->post('username')."' and password = '".md5($this->input->post('password'))."'";
   $result = $this->db->query($sql);
   //echo $this->db->last_query();
        $row=$result->row();
        //echo $row->theticketcount;
        
       if($row->theticketcount>0) {
                return true;
            }
            else 
                return false;
        } else
            return false;
    }
  

   
}