<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-book"></i> Content Delivery Report
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
                           
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="contentdeliverydatatable" class="table table-bordered table-striped">
                            <thead>

                                 <tr>
                                     <th>ID</th>
                                      <th>Package</th>
                                      <th>Content</th>
                                     <th>Subscriber</th>
                                     <th>Sent Status</th>
                                      
                                     
                                      
                                       <th>Date </th>
                                     
                                    
                                     
                                         
                                           
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




<script type="text/javascript">



    $(document).ready(function () {






 
 datatableglobalobject = $('#contentdeliverydatatable').DataTable({
		"sScrollY": "400px",
               
		"bProcessing": true,
	        "bServerSide": true,
	        "sServerMethod": "POST",
	        "sAjaxSource": baseurl+"contentdelivery/getcontentdeliveryfordatatable",
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
                          
                       
                        
                        
			
	        ],
            
	});
 



    });

</script>