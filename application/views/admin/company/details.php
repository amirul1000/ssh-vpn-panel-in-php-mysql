<a  href="<?php echo site_url('admin/company/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Company'); ?></h5>
<!--Data display of company with id--> 
<?php
	$c = $company;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Company Name</td><td><?php echo $c['company_name']; ?></td></tr>

<tr><td>Address</td><td><?php echo $c['address']; ?></td></tr>

<tr><td>Country</td><td><?php echo $c['country']; ?></td></tr>

<tr><td>City</td><td><?php echo $c['city']; ?></td></tr>

<tr><td>State</td><td><?php echo $c['state']; ?></td></tr>

<tr><td>Zip</td><td><?php echo $c['zip']; ?></td></tr>

<tr><td>File Company Logo</td><td><?php
											if(is_file(APPPATH.'../public/'.$c['file_company_logo'])&&file_exists(APPPATH.'../public/'.$c['file_company_logo']))
											{
										 ?>
										  <img src="<?php echo base_url().'public/'.$c['file_company_logo']?>" class="picture_50x50">
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

<tr><td>File Report Logo</td><td><?php
											if(is_file(APPPATH.'../public/'.$c['file_report_logo'])&&file_exists(APPPATH.'../public/'.$c['file_report_logo']))
											{
										 ?>
										  <img src="<?php echo base_url().'public/'.$c['file_report_logo']?>" class="picture_50x50">
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

<tr><td>File Report Background</td><td><?php
											if(is_file(APPPATH.'../public/'.$c['file_report_background'])&&file_exists(APPPATH.'../public/'.$c['file_report_background']))
											{
										 ?>
										  <img src="<?php echo base_url().'public/'.$c['file_report_background']?>" class="picture_50x50">
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

<tr><td>Report Footer</td><td><?php echo $c['report_footer']; ?></td></tr>


</table>
<!--End of Data display of company with id//--> 