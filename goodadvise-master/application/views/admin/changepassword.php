 
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-lock"></i> Change Password
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

               
              <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-titles">
                            
                            
                        </h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <div  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Password Change Form</h4>
            </div>
 <form class="form-signin" role="form" action="<?php echo base_url();?>index.php/admin/changepassword" onsubmit="return processChangePassword(event)" id="changepasswordform" method="post">
     
                <div class="modal-body">
                    <div class="box-body">
                         <div class="form-group">
                            <label >Old Password</label>
                             <input id='oldpassword'type="password" class="form-control" placeholder="Old Password" autofocus required name="password">
         
                        </div>
                         <div class="form-group">
                            <label >New Password</label>
                              <input id='newpassword' type="password" class="form-control" placeholder="New Password" required name="password1">
        
                        </div>
                         <div class="form-group">
                            <label > Confirm New Password</label>
                              <input id='confirmnewpassword' type="password" class="form-control" placeholder="Confirm New Password" required  name="confirmpassword">
       
                        </div>
                        

                    </div><!-- /.box-body -->



                </div>
                <div class="modal-footer">
                    <button onclick="resetpasswordform()" type="button" class="btn btn-default" >Reset</button>
                    <button type="submit"  
                            class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
     
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
 
               

               

               

            </div>
            <!-- /.container-fluid -->

        </div>
