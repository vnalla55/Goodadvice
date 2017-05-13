<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-archive"></i> Package
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

               
                <!-- /.row -->
 <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-titles">
                            <button type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#packageadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Package"><i class="fa fa-plus"></i> Add Package</button>
                            
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="packagedatatable" class="table table-bordered table-striped">
                            <thead>

                                 <tr>
                                     <th>ID</th>
                                     <th>Name</th>
                                      <th>Description</th>
                                     <th>No of Contents</th>
                                     
                                     
                                    
                                     <th>Frequency</th>
                                      <th>Time</th>
                                       <th>Day of Week</th>
                                        <th>Day of month</th>
                                         
                                            <th>Actions</th>
                                 </tr>




                            </thead>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
               

               

               

            </div>
            <!-- /.container-fluid -->

        </div>

<div class="modal fade" id="packageadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Package Add Form</h4>
            </div>
                       <form  action="<?php echo base_url(); ?>index.php/package/addpackage" onsubmit="return packageinfoadd(event)" id="packageaddform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Package Name</label>
                            <input type="text" class="form-control" name="" id="packagename1" required>
                        </div>
                         <div class="form-group">
                            <label >Package Description</label>
                            <input type="text" class="form-control" name="" id="packagedescription1" required>
                        </div>
                         <div class="form-group">
                            <label >No of Contents</label>
                            <input type="number" class="form-control" name="" id="packagenoofcontents1" required>
                        </div>
                        <div class="form-group">
                            <label >Icon</label>
                           <input id="packageiconfile1" type="file" name="packagefile1" size="20" />
                                   
                                   
                        </div>
                        <div class="form-group">
                            <label >Preview</label>
                            <img id="previewpackageicon1" width="100" height="100" src="">
                        </div>
                            
                         <div class="form-group">
                            <label >Service Id</label>
                            <input type="text" class="form-control" name="" id="serviceid1" required>
                        </div>
                        <div class="form-group">
                            <label >Secret</label>
                            <input type="text" class="form-control" name="" id="secret1" required>
                        </div>
                        
                     
                        <div class="form-group">
                            <label >Frequency</label>
                             <select id="frequency1" class="form-control">
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                         <option value="monthly">Monthly</option>

                                      

                                    </select>
                        </div>
                        
                             <div class="form-group" id="changeablepackageadd1">
                 <label> Time</label> 
                 <div class="input-group date timepicker" > 
                     <input id="packagetime1" type="text" class="form-control" required/> 
                     <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span> 
                     </span>  
                 </div>

                        </div>
                         <div class="form-group" id="changeablepackageadd2">
                 

                        </div>
                         
                        
                        
                        
                      
                          
                            

                    </div><!-- /.box-body -->



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="packageedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Package Edit Form</h4>
            </div>
                       <form  action="<?php echo base_url(); ?>index.php/package/updatepackage" onsubmit="return packageinfoupdate(event)" id="packageupdateform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Package Name</label>
                            <input type="text" class="form-control" name="packagename" id="packagename" required>
                        </div>
                         <div class="form-group">
                            <label >Package Description</label>
                            <input type="text" class="form-control" name="" id="packagedescription" required>
                        </div>
                        <div class="form-group">
                            <label >No of Contents</label>
                            <input type="number" class="form-control" name="" id="packagenoofcontents" required>
                        </div>
                        <div class="form-group">
                            <label >Icon</label>
                           <input id="packageiconfile" type="file" name="packagefile" size="20" />
                                 <input type="hidden" name="previouspackageicon" value=""/>    
                                   
                        </div>
                        <div class="form-group">
                            <label >Preview</label>
                            <img id="previewpackageicon" width="100" height="100" src="">
                        </div>
                        <div class="form-group">
                            <label >Service Id</label>
                            <input type="text" class="form-control" name="" id="serviceid" required>
                        </div>
                        <div class="form-group">
                            <label >Secret</label>
                            <input type="text" class="form-control" name="" id="secret" required>
                        </div>
                     
                        <div class="form-group">
                            <label >Frequency</label>
                             <select id="frequency" class="form-control">
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                         <option value="monthly">Monthly</option>

                                      

                                    </select>
                        </div>
                        
                             <div class="form-group" id="changeablepackageupdate">
                 <label> Time</label> 
                 <div class="input-group date timepicker" > 
                     <input id="packagetime" type="text" class="form-control" required/> 
                     <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span> 
                     </span>  
                 </div>

                        </div>
                         <div class="form-group" id="changeablepackageupdate2">
                 

                        </div>
                         
                        
                        
                        
                      
                          
                            

                    </div><!-- /.box-body -->



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="packagedelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete?</h4>
            </div>
           
               
                <div class="modal-footer">
                     <button id='yesforpackage' type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                   
                </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#packagedatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"package/getpackagefordatatable/",
	        "iDisplayLength": 10,
	        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "aaSorting": [[0, 'asc']],
                
	        "aoColumns": [
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": false, "bSortable": false },
                       
                        
                        
			
	        ],
             "fnDrawCallback": function () {
   $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forpackage($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forpackage($(this))
            });
           
  }
	});

 



    });

</script>