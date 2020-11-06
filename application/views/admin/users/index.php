<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Users'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/users/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/users/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/users/search/',array("class"=>"form-horizontal")); ?>
                    <input name="key" type="text"
				value="<?php echo isset($key)?$key:'';?>" placeholder="Search..."
				class="form-control">
				<button type="submit" class="mr-0">
					<i class="fa fa-search"></i>
				</button>
                <?php echo form_close(); ?>
            </li>
		</ul>
	</div>
</div>
<!--End of Action//--> 
   
<!--Data display of users-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Email</th>
<th>Password</th>
<th>Title</th>
<th>First Name</th>
<th>Last Name</th>
<th>File Picture</th>
<th>Phone No</th>
<th>Dob</th>
<th>Company</th>
<th>Address</th>
<th>City</th>
<th>State</th>
<th>Zip</th>
<th>Country</th>
<th>User Type</th>
<th>Status</th>

		<th>Actions</th>
    </tr>
	<?php foreach($users as $c){ ?>
    <tr>
		<td><?php echo $c['email']; ?></td>
<td><?php echo $c['password']; ?></td>
<td><?php echo $c['title']; ?></td>
<td><?php echo $c['first_name']; ?></td>
<td><?php echo $c['last_name']; ?></td>
<td><?php
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
										</td>
<td><?php echo $c['phone_no']; ?></td>
<td><?php echo $c['dob']; ?></td>
<td><?php echo $c['company']; ?></td>
<td><?php echo $c['address']; ?></td>
<td><?php echo $c['city']; ?></td>
<td><?php echo $c['state']; ?></td>
<td><?php echo $c['zip']; ?></td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Country_model');
									   $dataArr = $this->CI->Country_model->get_country($c['country_id']);
									   echo $dataArr['country'];?>
									</td>
<td><?php echo $c['user_type']; ?></td>
<td><?php echo $c['status']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/users/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/users/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/users/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of users//--> 

<!--No data-->
<?php
	if(count($users)==0){
?>
 <div align="center"><h3>Data is not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
	echo $link;
?>
<!--End of Pagination//-->
