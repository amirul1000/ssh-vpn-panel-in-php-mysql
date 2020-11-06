<ul class="right-side-content d-flex align-items-center">
   

    <li class="nav-item dropdown">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php
		  if(is_file(APPPATH.'../public/'.$this->session->userdata['file_picture'])&&file_exists(APPPATH.'../public/'.$this->session->userdata['file_picture']))
		   {
		 ?>
			  <img class="border-radius-50" src="<?php echo base_url().'public/'.$this->session->userdata['file_picture']?>" alt="">
		<?php
			}
			else
			{
		?>
			  <img class="border-radius-50" src="<?php echo base_url()?>public/uploads/no_image.jpg">
		<?php		
			}
		  ?>
        </button>  
        <div class="dropdown-menu dropdown-menu-right">
            <!-- User Profile Area -->
            <div class="user-profile-area">
                <div class="user-profile-heading">
                    <!-- Thumb -->
                    <div class="profile-thumbnail">
                    <?php
					  if(is_file(APPPATH.'../public/'.$this->session->userdata['file_picture'])&&file_exists(APPPATH.'../public/'.$this->session->userdata['file_picture']))
					   {
					 ?>
					      <img class="border-radius-50" src="<?php echo base_url().'public/'.$this->session->userdata['file_picture']?>" alt="">
					<?php
						}
						else
						{
					?>
					      <img class="border-radius-50" src="<?php echo base_url()?>public/uploads/no_image.jpg">
					<?php		
						}
					  ?>
                    </div>
                    <!-- Profile Text -->
                    <div class="profile-text">
                        <h6><?php echo $this->session->userdata['first_name']?> <?php echo $this->session->userdata['last_name']?></h6>
                        <!--<span><?php echo $this->session->userdata['first_name']?></span>-->
                    </div>
                </div>
                <a href="<?php echo site_url('admin/profile/index'); ?>" class="dropdown-item"><i class="ti-user text-default" aria-hidden="true"></i> My profile</a>
                <a href="<?php echo site_url('admin/login/do_logout'); ?>" class="dropdown-item"><i class="ti-unlink text-warning" aria-hidden="true"></i> Sign-out</a>
            </div>
        </div>
    </li>
</ul>