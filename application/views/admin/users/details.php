<a  href="<?php echo site_url('admin/users/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Users'); ?></h5>
<!--Data display of users with id--> 
<?php
	$c = $users;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Email</td><td><?php echo $c['email']; ?></td></tr>

<tr><td>Password</td><td><?php echo $c['password']; ?></td></tr>

<tr><td>Title</td><td><?php echo $c['title']; ?></td></tr>

<tr><td>First Name</td><td><?php echo $c['first_name']; ?></td></tr>

<tr><td>Last Name</td><td><?php echo $c['last_name']; ?></td></tr>

<tr><td>File Picture</td><td><?php
											if(is_file(APPPATH.'../public/'.$c['file_picture'])&&file_exists(APPPATH.'../public/'.$c['file_picture']))
											{
										 ?>
										  <img src="<?php echo base_url().'public/'.$c['file_picture']?>" class="picture_50x50">
										  <?php
											}
											else
											{
										?>
										<img src="<?php echo base_url()?>public/uploads/no_image.jpg" class="picture_50x50">
										<?php		
											}
										  ?>	
										</td></tr>

<tr><td>Phone No</td><td><?php echo $c['phone_no']; ?></td></tr>

<tr><td>Dob</td><td><?php echo $c['dob']; ?></td></tr>

<tr><td>Company</td><td><?php echo $c['company']; ?></td></tr>

<tr><td>Address</td><td><?php echo $c['address']; ?></td></tr>

<tr><td>City</td><td><?php echo $c['city']; ?></td></tr>

<tr><td>State</td><td><?php echo $c['state']; ?></td></tr>

<tr><td>Zip</td><td><?php echo $c['zip']; ?></td></tr>

<tr><td>Country</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Country_model');
									   $dataArr = $this->CI->Country_model->get_country($c['country_id']);
									   echo $dataArr['country'];?>
									</td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>

<tr><td>User Type</td><td><?php echo $c['user_type']; ?></td></tr>

<tr><td>Status</td><td><?php echo $c['status']; ?></td></tr>


</table>
<!--End of Data display of users with id//--> 