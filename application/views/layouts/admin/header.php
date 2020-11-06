<!doctype html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Admin</title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url(); ?>public/riktheme/img/core-img/favicon.png">

    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/riktheme/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/custom.css">    
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/datepicker/jquery-ui.css">
	<script src="<?php echo base_url(); ?>public/datepicker/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>public/datepicker/jquery-ui.js"></script>

</head>

<body>
    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="ecaps-page-wrapper">
        <!-- Sidemenu Area -->
        <div class="ecaps-sidemenu-area">
            <!-- Desktop Logo -->
            <div class="ecaps-logo">
                <?php
					 $this->CI =& get_instance(); 
					 $this->CI->load->database();  
					 $this->CI->load->model('Company_model'); 
					 $dataArr = $this->CI->Company_model->get_all_company(); 
					 $file_company_logo = $dataArr[0]['file_company_logo'];
				  if(is_file(APPPATH.'../public/'.$file_company_logo)&&file_exists(APPPATH.'../public/'.$file_company_logo))
					{
				 ?>
					 <a href="<?php echo site_url('homecontroller'); ?>"><img class="desktop-logo" src="<?php echo base_url(); ?>public/<?=$file_company_logo?>" alt="Desktop Logo"> <img class="small-logo" src="<?php echo base_url(); ?>public/<?=$file_company_logo?>" alt="Mobile Logo"></a>
				<?php
					}
					else
					{
				?>
					 <a href="<?php echo site_url('homecontroller'); ?>"><img class="desktop-logo" src="<?php echo base_url(); ?>public/uploads/logo.png" alt="Desktop Logo"> <img class="small-logo" src="<?php echo base_url(); ?>public/uploads/logo.png" alt="Mobile Logo"></a>
				<?php		
					}
				  ?>
            </div>

            <!-- Side Nav -->
            <div class="ecaps-sidenav" id="ecapsSideNav">
                <!-- Side Menu Area -->
                <div class="side-menu-area">
                    <!-- Sidebar Menu -->
                    <?php
					   include("left_menu.php"); 
					?>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="ecaps-page-content">
            <!-- Top Header Area -->
            <header class="top-header-area d-flex align-items-center justify-content-between">
                <div class="left-side-content-area d-flex align-items-center">
                    <!-- Mobile Logo -->
                    <div class="mobile-logo mr-3 mr-sm-4">
                        <?php
							 $this->CI =& get_instance(); 
							 $this->CI->load->database();  
							 $this->CI->load->model('Company_model'); 
							 $dataArr = $this->CI->Company_model->get_all_company(); 
							 $file_company_logo = $dataArr[0]['file_company_logo'];
                          if(is_file(APPPATH.'../public/'.$file_company_logo)&&file_exists(APPPATH.'../public/'.$file_company_logo))
							{
						 ?>
						     <a href="<?php echo site_url('homecontroller'); ?>"><img src="<?php echo base_url().'public/'.$file_company_logo?>"></a>
						<?php
							}
							else
							{
						?>
						     <a href="<?php echo site_url('homecontroller'); ?>"><img src="<?php echo base_url(); ?>public/uploads/logo.png" alt="Mobile Logo"></a>
						<?php		
							}
						  ?>
                    </div>

                    <!-- Triggers -->
                    <div class="ecaps-triggers mr-1 mr-sm-3">
                        <div class="menu-collasped" id="menuCollasped">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                        <div class="mobile-menu-open" id="mobileMenuOpen">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                    </div>

                    <!-- Left Side Nav -->
                    <!--<ul class="left-side-navbar d-flex align-items-center">
                        <li class="hide-phone app-search mr-15">
                            <form role="search" class=""><input type="text" placeholder="Search..." class="form-control"> <button type="submit" class="mr-0"><i class="fa fa-search"></i></button></form>
                        </li>
                    </ul>-->
                </div>

                <div class="right-side-navbar d-flex align-items-center justify-content-end">
                    <!-- Mobile Trigger -->
                    <div class="right-side-trigger" id="rightSideTrigger">
                        <i class="ti-align-left"></i>
                    </div>

                    <!-- Top Bar Nav -->
                    <?php
					   include("topbarnav.php");
					?>
                </div>
            </header>

            <!-- Main Content Area -->
            <div class="main-content">
                <div class="container-fluid"> 
                