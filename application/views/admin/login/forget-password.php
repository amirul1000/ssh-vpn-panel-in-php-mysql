<!doctype html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Forget Password</title>

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
    <div class="main-content- forget-password-area h-100vh">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-sm-10 col-md-7 col-lg-5 mx-auto">
                    <!-- Middle Box -->
                    <div class="middle-box">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="font-22">Reset Your Password</h4>
                                <p>Enter your email address and your password will be reset and emailed to you.</p>
                                <?=$msg?>
                                <!-- Form -->
                                <?php echo form_open_multipart('admin/login/forget_password_process',array("class"=>"form-horizontal")); ?>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : ''); ?>" class="form-control password" placeholder="Email address" required="">
                                    </div>
                                    <div class="btn-area">
                                        <button type="submit" class="btn btn-rounded btn-outline-primary py-2 px-4 btn-block mt-15 text-white">Send new password</button>
                                    </div>
                                <?php echo form_close(); ?>
                                <a href="<?php echo site_url(); ?>/admin/login/index" class="text-dark float-right"><span class="font-12 text-primary">Back
                                </span></a>
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