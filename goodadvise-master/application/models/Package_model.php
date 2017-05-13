<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class package_model extends CI_Model{
     public function getpackagecontentinfobyid($packagecontentinfo_id) {

       $result = $this->db->get_where('subscription_package_content', array('subscription_package_content_id' => $packagecontentinfo_id));
            return $result->result_array();
    }
     public function getpackageinfobyid($packageinfo_id) {

       $result = $this->db->get_where('subscription_package', array('subscription_package_id' => $packageinfo_id));
            return $result->result_array();
    }
    function getPackageForPackageContent(){
           $this->db->select('*');
            $this->db->from('subscription_package');
            $result = $this->db->get();
            return $result;
    }
     public function deletepackagecontent_M($packagecontent_id) {

        
            if ($this->db->delete('subscription_package_content', array('subscription_package_content_id' => $packagecontent_id)))
     return 1;
            
     }
     public function deletepackage_M($package_id) {

        
            if ($this->db->delete('subscription_package', array('subscription_package_id' => $package_id)))
     return 1;
            
     }
     public function getthecountreachedforagivenpackageincontenttable(){
         $sql = "SELECT COALESCE(count(subscription_package_id),0) as therowcount
FROM subscription_package_content
WHERE  subscription_package_id = ".$this->input->post('subscription_package_id');

        $result = $this->db->query($sql);
            
//             $num_rows = $this->db->get('')->num_rows();
            
             // $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row=$result->row();
         
        
                  $noofcontentreachedincontenttable =  $row->therowcount;
                  return $noofcontentreachedincontenttable;
     }
     public function getthecountofnoofcontentsforagivenpackage(){
          $sql = "SELECT no_of_contents
FROM subscription_package
WHERE  	subscription_package_id = ".$this->input->post('subscription_package_id');

        $result = $this->db->query($sql);
            
//             $num_rows = $this->db->get('')->num_rows();
            
             // $result = $this->db->query($sql);
        //echo $this->db->last_query();

        $row=$result->row();
         
        
                $noofcontentinpackagetable =  $row->no_of_contents;
                return $noofcontentinpackagetable;
     }
      public function addpackagecontentinfo() {
         
 
            $new_member_insert_data = array(
                    'subscription_package_content_title' => $this->input->post('subscription_package_content_title'),
                    'subscription_package_content' => $this->input->post('subscription_package_content'),
                    'subscription_package_id' => $this->input->post('subscription_package_id'),
                    
                    
                );
              
                $insert = $this->db->insert('subscription_package_content', $new_member_insert_data);
                if ($insert) 
                    return 1; 
                 
     
           
        
    }
     public function addpackageinfo() {
       
              
               
  $allowedExts = array("gif", "jpeg", "jpg", "png");
        if ($_FILES["packagefile1"]["name"]) {
            $temp = explode(".", $_FILES["packagefile1"]["name"]);
            $extension = end($temp);

            if ((($_FILES["packagefile1"]["type"] == "image/gif") || ($_FILES["packagefile1"]["type"] == "image/jpeg") || ($_FILES["packagefile1"]["type"] == "image/jpg") || ($_FILES["packagefile1"]["type"] == "image/pjpeg") || ($_FILES["packagefile1"]["type"] == "image/x-png") || ($_FILES["packagefile1"]["type"] == "image/png")) && in_array($extension, $allowedExts)) {
                if ($_FILES["packagefile1"]["error"] > 0) {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                } else {
                    //echo "Upload: " . $_FILES["lotterygamefile"]["name"] . "<br>";
                    //echo "Type: " . $_FILES["lotterygamefile"]["type"] . "<br>";
                    //echo "Size: " . ($_FILES["lotterygamefile"]["size"] / 1024) . " kB<br>";
                    // echo "Temp file: " . $_FILES["lotterygamefile"]["tmp_name"] . "<br>";
                    if (file_exists("/home/technoes/public_html/goodadvise/sms_test/images/" . $_FILES["packagefile1"]["name"])) {
                        echo $_FILES["packagefile1"]["name"] . " already exists. ";
                    } else {
                        move_uploaded_file($_FILES["packagefile1"]["tmp_name"], "/home/technoes/public_html/goodadvise/sms_test/images/" . $_FILES["packagefile1"]["name"]);
                        //echo "Stored in: lotterygameicons/" . $_FILES["lotterygamefile"]["name"];
$renamedfile=$this->input->post('subscription_package_name').date('Y-m-d H.i.s').'.'.$extension;
 rename("/home/technoes/public_html/goodadvise/sms_test/images/".$_FILES["packagefile1"]["name"], "/home/technoes/public_html/goodadvise/sms_test/images/".$renamedfile);
   $new_member_insert_data = array(
                    'subscription_package_name' => $this->input->post('subscription_package_name'),
              'service_id' => $this->input->post('service_id'),
                    'package_description' => $this->input->post('package_description'),
        'no_of_contents' => $this->input->post('no_of_contents'),
                    'secret' => $this->input->post('secret'),
                    'frequency' => $this->input->post('frequency'),
                    'time' => $this->input->post('time'),
              'package_icon' => $renamedfile,
                    'day_of_week' => $this->input->post('day_of_week'),
                    'day_of_month' => $this->input->post('day_of_month'),
                    
                );
                       $insert = $this->db->insert('subscription_package', $new_member_insert_data);
                if ($insert) 
                    return $this->db->insert_id();
                else return 0;
                    }//if file doesnot exist
                }
            } else {
                echo "Invalid file";
                return 0;
                 
            }
        } else {
            echo "No file selected";
            return 0;
            
        }//if another file isnot selected
     
             
        
    }
    
              public function updatepackagecontentinfo($packagecontent_id) {

     
             $new_member_insert_data = array(
                     'subscription_package_content_title' => $this->input->post('subscription_package_content_title'),
                    'subscription_package_content' => $this->input->post('subscription_package_content'),
                    'subscription_package_id' => $this->input->post('subscription_package_id'),
                    
                    
                );
                $this->db->where('subscription_package_content_id', $packagecontent_id);
                $insert = $this->db->update('subscription_package_content', $new_member_insert_data);
                if ($insert) 
                    return 1;
        
    }
     public function updatepackageinfo($package_id) {
 $allowedExts = array("gif", "jpeg", "jpg", "png");
            if ($_FILES["packagefile"]["name"]) {
                $temp = explode(".", $_FILES["packagefile"]["name"]);
                $extension = end($temp);

                if ((($_FILES["packagefile"]["type"] == "image/gif") || ($_FILES["packagefile"]["type"] == "image/jpeg") || ($_FILES["packagefile"]["type"] == "image/jpg") || ($_FILES["packagefile"]["type"] == "image/pjpeg") || ($_FILES["packagefile"]["type"] == "image/x-png") || ($_FILES["packagefile"]["type"] == "image/png")) && in_array($extension, $allowedExts)) {
                    if ($_FILES["packagefile"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                    } else {
                        //echo "Upload: " . $_FILES["lotterygamefile"]["name"] . "<br>";
                        //echo "Type: " . $_FILES["lotterygamefile"]["type"] . "<br>";
                        //echo "Size: " . ($_FILES["lotterygamefile"]["size"] / 1024) . " kB<br>";
                        // echo "Temp file: " . $_FILES["lotterygamefile"]["tmp_name"] . "<br>";
                        if (file_exists("/home/technoes/public_html/goodadvise/sms_test/images/" . $_FILES["packagefile"]["name"])) {
                            echo $_FILES["packagefile"]["name"] . " already exists. ";
                        } else {
                             move_uploaded_file($_FILES["packagefile"]["tmp_name"], "/home/technoes/public_html/goodadvise/sms_test/images/" . $_FILES["packagefile"]["name"]);
                          
                               //echo "Stored in: lotterygameicons/" . $_FILES["lotterygamefile"]["name"];
$renamedfile=$this->input->post('subscription_package_name').date('Y-m-d H.i.s').'.'.$extension;
 rename("/home/technoes/public_html/goodadvise/sms_test/images/".$_FILES["lotterygroupfile"]["name"], "/home/technoes/public_html/goodadvise/sms_test/images/".$renamedfile);
 
                             $new_member_insert_data = array(
                    'subscription_package_name' => $this->input->post('subscription_package_name'),
                     'package_description' => $this->input->post('package_description'),
                                   'no_of_contents' => $this->input->post('no_of_contents'),
                                  'package_icon' => $renamedfile,
                                 'service_id' => $this->input->post('service_id'),
                    'secret' => $this->input->post('secret'),
                    'frequency' => $this->input->post('frequency'),
                    'time' => $this->input->post('time'),
                    'day_of_week' => $this->input->post('day_of_week'),
                    'day_of_month' => $this->input->post('day_of_month'),
                    
                );
                $this->db->where('subscription_package_id', $package_id);
                $insert = $this->db->update('subscription_package', $new_member_insert_data);
                if ($insert) 
                    return 1;
                            $dir = "/home/technoes/public_html/goodadvise/sms_test/images";
                            $dirHandle = opendir($dir);
                            while ($file = readdir($dirHandle)) {
                                if ($file == $this->input->post('previouspackageicon')) {
                                    if (unlink($dir . '/' . $file)) {
                                        //echo 'file successfully deleted';
                                    } else {
                                        // echo 'file could not be deleted';
                                    }
                                }
                            }

                            closedir($dirHandle);
                        }//if file doesnot exist
                    }
                } else {
                    echo "Invalid file";
                }
            } else {
                 $new_member_insert_data = array(
                    'subscription_package_name' => $this->input->post('subscription_package_name'),
                     'package_description' => $this->input->post('package_description'),
                                  'no_of_contents' => $this->input->post('no_of_contents'),  
                                 'service_id' => $this->input->post('service_id'),
                    'secret' => $this->input->post('secret'),
                    'frequency' => $this->input->post('frequency'),
                    'time' => $this->input->post('time'),
                    'day_of_week' => $this->input->post('day_of_week'),
                    'day_of_month' => $this->input->post('day_of_month'),
                    
                );
                $this->db->where('subscription_package_id', $package_id);
                $insert = $this->db->update('subscription_package', $new_member_insert_data);
                if ($insert) 
                    return 1;
            }//if another file isnot selected
     
           
        
    }
     function  getallpackagecontentlistfordatatable() {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('subscription_package_content_id', 'subscription_package_name', 'subscription_package_content_title', 'subscription_package_content', 'entered_on');
        
        // DB table to use
        $sTable = 'subscription_package_content';
        //
    
        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);
    
        // Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }
        
        // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
    
                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }
        
        /* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if(isset($sSearch) && !empty($sSearch))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                if(isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }
        
        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $this->db->from($sTable);
        $this->db->join('subscription_package', 'subscription_package.subscription_package_id = subscription_package_content.subscription_package_id');
                

               
        $rResult = $this->db->get('');
    
        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
    
        // Total data set length
        $iTotal = $this->db->count_all($sTable);
    
        // Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
        //$aColumns1 = array('role_id', 'rolename');
        foreach($rResult->result_array() as $aRow)
        {
            $row = array();
            
            foreach($aColumns as $col)
            {
               
                $row[] = $aRow[$col];
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#packagecontentedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Package Content"><i class="glyphicon glyphicon-edit" alt="'.$aRow['subscription_package_content_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#packagecontentdelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['subscription_package_content_id'].'"></i></a>';
                
          
     $row[] =$updatelink.'|'.$deletelink;
            $output['aaData'][] = $row;
        }
        //var_dump($output);
    //print_r($output);
       echo json_encode($output);
    }
   
     function getallpackagelistfordatatable() {
       
                   /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('subscription_package_id', 'subscription_package_name','package_description','no_of_contents', 'frequency', 'time', 'day_of_week','day_of_month');
        
        // DB table to use
        $sTable = 'subscription_package';
        //
    
        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);
    
        // Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }
        
        // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
    
                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }
        
        /* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if(isset($sSearch) && !empty($sSearch))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                if(isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }
        
        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $this->db->from($sTable);
               
        $rResult = $this->db->get('');
    
        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
    
        // Total data set length
        $iTotal = $this->db->count_all($sTable);
    
        // Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
        //$aColumns1 = array('role_id', 'rolename');
        foreach($rResult->result_array() as $aRow)
        {
            $row = array();
            
            foreach($aColumns as $col)
            {
               
                $row[] = $aRow[$col];
            }
            $updatelink='<a  class="popup" data-toggle="modal" data-target="#packageedit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Package"><i class="glyphicon glyphicon-edit" alt="'.$aRow['subscription_package_id'].'"></i></a>';
    $deletelink='<a class="popup" data-toggle="modal" data-target="#packagedelete" data-toggle="tooltip" data-placement="top" title=""  data-original-title="Delete Selected"><i class="glyphicon glyphicon-trash"  alt="'.$aRow['subscription_package_id'].'"></i></a>';
                
          
     $row[] =$updatelink.'|'.$deletelink;
            $output['aaData'][] = $row;
        }
        //var_dump($output);
    //print_r($output);
       echo json_encode($output);
    }
}