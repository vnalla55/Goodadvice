<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GoodAdvise</title>

     <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>resource/admintheme/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>resource/admintheme/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>resource/admintheme/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>resource/admintheme/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!-- toaster -->
     <link href="<?php echo base_url(); ?>resource/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>resource/bootstrap-datetimepicker-0.0.11/css/bootstrap3-datetimepicker.min.css" type="text/css"/>
    
     <!-- DATA TABLES -->
    <link href="<?php echo base_url(); ?>resource/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    
     <!-- IOS Overlay -->
  <link rel="stylesheet" href="<?php echo base_url();?>resource/iosoverlay/iosOverlay.css">
  <link rel="stylesheet" href="<?php echo base_url();?>resource/iosoverlay/prettify.css">
  
   <!-- summernote - text editor -->
      <link href="<?php echo base_url();?>resource/summernote-master/dist/summernote.css" rel="stylesheet">
     
    <!-- Custom Css -->  
  <link href="<?php echo base_url(); ?>css/admincss.css" rel="stylesheet" type="text/css" />
   
  
  
  <!-- jQuery -->
    <script src="<?php echo base_url(); ?>resource/admintheme/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>resource/admintheme/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>resource/admintheme/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>resource/admintheme/js/plugins/morris/morris.min.js"></script>
   
    <script src="<?php echo base_url(); ?>resource/bootstrap-toastr/toastr.min.js"></script>
    <script src="<?php echo base_url(); ?>resource/bootstrap-toastr/ui-toastr.js"></script>
     <script  src="<?php echo base_url(); ?>resource/bootstrap-datetimepicker-0.0.11/js/moment.js"></script>
  
    <script  src="<?php echo base_url(); ?>resource/bootstrap-datetimepicker-0.0.11/js/bootstrap3-datetimepicker.min.js"></script>
  
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url(); ?>resource/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>resource/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    
     
     <!-- ios overlay -->
    <script src="<?php echo base_url();?>resource/iosoverlay/iosOverlay.js"></script>
  <script src="<?php echo base_url();?>resource/iosoverlay/spin.min.js"></script>
  <script src="<?php echo base_url();?>resource/iosoverlay/prettify.js"></script>
  
   <!-- summernote -->
    <script src="<?php echo base_url();?>resource/summernote-master/dist/summernote.min.js"></script>

    
    <script  src="<?php echo base_url(); ?>js/adminjs.js"></script>
    <script  src="<?php echo base_url(); ?>js/package.js"></script>
      <script  src="<?php echo base_url(); ?>js/packagecontent.js"></script>
       <script  src="<?php echo base_url(); ?>js/changepassword.js"></script>
     <script type="text/javascript">

            $(document).ready(function () {

                baseUrlForJsFile('<?php echo base_url(); ?>'); 
          
            });
        </script><!-- Base URL to be used in js file -->
    


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>admin/dashboard">Good Advise Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if(isset($_SESSION['superadmin_name'])) echo $_SESSION['superadmin_name'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url() ?>admin/logOut"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?php if($menuactiveornot=='dashboard') echo 'active'; ?>">
                        <a href="<?php echo base_url() ?>admin/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="<?php if($menuactiveornot=='package') echo 'active'; ?>">
                        <a href="<?php echo base_url() ?>package"><i class="fa fa-fw fa-archive"></i> Package</a>
                    </li>
                     <li class="<?php if($menuactiveornot=='subscriber') echo 'active'; ?>">
                        <a href="<?php echo base_url() ?>subscriber"><i class="fa fa-fw fa-user"></i> Subscriber</a>
                    </li>
                    <li class="<?php if($menuactiveornot=='packagecontent') echo 'active'; ?>">
                        <a href="<?php echo base_url() ?>package/packagecontent"><i class="fa fa-fw fa-envelope"></i> Package Content</a>
                    </li>
                    <li class="<?php if($menuactiveornot=='subscription') echo 'active'; ?>">
                        <a href="<?php echo base_url() ?>subscription"><i class="fa fa-fw fa-film"></i> Subscription</a>
                    </li>
                     <li class="<?php if($menuactiveornot=='contentdelivery') echo 'active'; ?>">
                        <a href="<?php echo base_url() ?>contentdelivery"><i class="fa fa-fw fa-book"></i> Content Delivery</a>
                    </li>
                     <li class="<?php if($menuactiveornot=='changepassword') echo 'active'; ?>">
                        <a href="<?php echo base_url() ?>admin/password"><i class="fa fa-fw fa-lock"></i> Change Password</a>
                    </li>
                    
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>