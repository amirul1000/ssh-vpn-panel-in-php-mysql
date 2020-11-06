<!doctype html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Login</title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url(); ?>public/riktheme/img/core-img/favicon.png">

    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/riktheme/style.css">

</head>

<body class="dark-color-overlay bg-img" style="background-image: url('<?php echo base_url(); ?>public/riktheme/img/bg-img/8.jpg');">

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content- h-100vh">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-sm-10 col-lg-8">
                    <!-- Middle Box -->
                    <div class="middle-box">
                        <div class="card mb-0">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="xs-d-none">
                                            <img src="<?php echo base_url(); ?>public/riktheme/img/bg-img/6.png" alt="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <!-- Logo -->
                                        <div class="card-body-login mb-30">
                                            <?php
												 $this->CI =& get_instance(); 
												 $this->CI->load->database();  
												 $this->CI->load->model('Company_model'); 
												 $dataArr = $this->CI->Company_model->get_all_company(); 
												 $file_company_logo = $dataArr[0]['file_company_logo'];
											  if(is_file(APPPATH.'../public/'.$file_company_logo)&&file_exists(APPPATH.'../public/'.$file_company_logo))
												{
											 ?>
												 <img src="<?php echo base_url(); ?>public/<?=$file_company_logo?>" alt="">
											<?php
												}
												else
												{
											?>
												 <img src="<?php echo base_url(); ?>public/uploads/logo.png" alt="">
											<?php		
												}
											  ?>
                                        </div>
                                         <?=$msg?>
                                        <h4 class="font-22 mb-30">Sign In</h4>

                                         <?php echo form_open_multipart('admin/login/login_process',array("class"=>"form-horizontal")); ?>
   
                                            <div class="form-group">
                                                <label class="float-left" for="emailaddress">Email address</label>
                                                <input class="form-control" type="email" name="email" id="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : ''); ?>" required="" placeholder="Enter your email">
                                            </div>

                                            <div class="form-group">
                                                <a href="<?php echo site_url(); ?>/admin/login/forget_password" class="text-dark float-right"><span class="font-12 text-primary">Forgot your password?</span></a>
                                                <label class="float-left" for="password">Password</label>
                                                <input class="form-control" type="password" name="password" id="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : ''); ?>" required="" placeholder="Enter your password">
                                            </div>

                                            <div class="form-group mb-3">
                                                <div class="custom-control custom-checkbox pl-0">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1"><span class="font-16">Remember me</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                            </div>

                                        <?php echo form_close(); ?>

                                        <a href="<?php echo site_url(); ?>/admin/login/register" class="text-dark float-right"><span class="font-12 text-primary">Create a new account
                                        </span></a>
                                    </div> <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    <script src="<?php echo base_url(); ?>public/riktheme/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/riktheme/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/riktheme/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/riktheme/js/bundle.js"></script>

    <!-- Active JS -->
    <script src="<?php echo base_url(); ?>public/riktheme/js/default-assets/active.js"></script>

</body>


</html>