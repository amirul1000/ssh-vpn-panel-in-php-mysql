<h5 class="font-20 mt-15 mb-1">Profile</h5>
<table class="table table-striped table-bordered">
		<tr><td>Email</td><td><?php echo $users['email'] ?></td></tr>
        <tr><td>Title</td><td><?php echo $users['title'] ?></td></tr>
        <tr><td>First Name</td><td><?php echo $users['first_name'] ?></td></tr>
        <tr><td>Last Name</td><td><?php echo $users['last_name'] ?></td></tr>
        <tr><td>File Picture</td><td>
		     <?php
				if(is_file(APPPATH.'../public/'.$users['file_picture'])&&file_exists(APPPATH.'../public/'.$users['file_picture']))
				{
			 ?>
			  <img src="<?php echo base_url().'public/'.$users['file_picture']?>" style="width:100px;height:100px;">
			  <?php
				}
				else
				{
			?>
            <img src="<?php echo base_url()?>public/uploads/no_image.jpg" style="width:100px;height:100px;">
            <?php		
				}
			  ?>	
        </td></tr>
        <tr><td>Phone No</td><td><?php echo $users['phone_no'] ?></td></tr>
        <tr><td>Dob</td><td><?php echo $users['dob'] ?></td></tr>
        <tr><td>Company</td><td><?php echo $users['company'] ?></td></tr>
        <tr><td>Address</td><td><?php echo $users['address'] ?></td></tr>
        <tr><td>City</td><td><?php echo $users['city'] ?></td></tr>
        <tr><td>State</td><td><?php echo $users['state'] ?></td></tr>
        <tr><td>Zip</td><td><?php echo $users['zip'] ?></td></tr>
        <tr><td>Country</td><td><?php echo $users['country_id'] ?></td></tr>
        <tr><td>Created At</td><td><?php echo $users['created_at'] ?></td></tr>
        <tr><td>Updated At</td><td><?php echo $users['updated_at'] ?></td></tr>
        <tr><td>User Type</td><td><?php echo $users['user_type'] ?></td></tr>
        <tr><td>Status</td><td><?php echo $users['status'] ?></td></tr>
		<tr><td>Action</td>
            <td>
                <a href="<?php echo site_url('admin/profile/save/'.$users['id']); ?>" class="btn btn-info btn-xs">Edit</a> 
            </td>
        </tr>
</table>