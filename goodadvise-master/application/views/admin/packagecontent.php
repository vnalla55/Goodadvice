<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-envelope"></i> Package Content
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
                            <button type="button" class="btn btn-primary popup" data-toggle="modal" data-target="#packagecontentadd" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Package Content"><i class="fa fa-plus"></i> Add Package Content</button>
                            
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="packagecontentdatatable" class="table table-bordered table-striped">
                            <thead>

                                 <tr>
                                     <th>ID</th>
                                      <th>Package</th>
                                     <th>Content Title</th>
                                      <th>Content </th>
                                       <th>Date </th>
                                     
                                    
                                     
                                         
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

<div class="modal fade" id="packagecontentadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Package Content Add Form</h4>
            </div>
                       <form  action="<?php echo base_url(); ?>index.php/package/addpackagecontent" onsubmit="return packagecontentinfoadd(event)" id="packagecontentaddform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Select Package</label>
                           <select id="packagelistforpackagecontent1" class="form-control">
                                          <?php 
foreach($packageinfo->result() as $rowforpackage){
    ?>
                                        <option value="<?php echo $rowforpackage->subscription_package_id; ?>" ><?php echo $rowforpackage->subscription_package_name; ?></option>
        <?php
}
?>
                                     
                                      

                                    </select>
                        </div>
                         <div class="form-group">
                            <label >Content Title</label>
                            <input type="text" class="form-control" name="" id="contenttitle1" >
                        </div>
                          <div class="form-group">
                            <label >Content </label>
                             <div id="content1"></div>
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

<div class="modal fade" id="packagecontentedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Package Content Edit Form</h4>
            </div>
                       <form  action="<?php echo base_url(); ?>index.php/package/updatepackagecontent" onsubmit="return packagecontentinfoupdate(event)" id="packagecontentupdateform" method="post">

                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label >Select Package</label>
                           <select id="packagelistforpackagecontent" class="form-control">
                                          <?php 
foreach($packageinfo->result() as $rowforpackage){
    ?>
                                        <option value="<?php echo $rowforpackage->subscription_package_id; ?>" ><?php echo $rowforpackage->subscription_package_name; ?></option>
        <?php
}
?>
                                     
                                      

                                    </select>
                        </div>
                       <div class="form-group">
                            <label >Content Title</label>
                            <input type="text" class="form-control" name="" id="contenttitle" >
                        </div>
                          <div class="form-group">
                            <label >Content </label>
                             <div id="content"></div>
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
<div class="modal fade" id="packagecontentdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete?</h4>
            </div>
           
               
                <div class="modal-footer">
                     <button id='yesforpackagecontent' type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                   
                </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">



    $(document).ready(function () {






  datatableglobalobject = $('#packagecontentdatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"package/getpackagecontentfordatatable/",
	        "iDisplayLength": 10,
	        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "aaSorting": [[0, 'asc']],
                
	        "aoColumns": [
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
			{ "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": true, "bSortable": true },
                         { "bVisible": true, "bSearchable": true, "bSortable": true },
                           { "bVisible": true, "bSearchable": true, "bSortable": true },
                        { "bVisible": true, "bSearchable": false, "bSortable": false },
                       
                        
                        
			
	        ],
             "fnDrawCallback": function () {
   $(".glyphicon-edit").bind('click', function () {
                glyphicon_edit_click_forpackagecontent($(this))
            });
            $(".glyphicon-trash").bind('click', function () {
                glyphicon_delete_click_forpackagecontent($(this))
            });
           
  }
	});

 
$('#content1').summernote({
        height: 180,
        maxHeight: 180,
    });
    $('#content').summernote({
        height: 180,
        maxHeight: 180,
    });


    });

</script>