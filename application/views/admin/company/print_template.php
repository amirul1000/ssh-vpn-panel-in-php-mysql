<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Company'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide">
</htmlpageheader>

<htmlpageheader name="otherpages" class="hide">
    <span class="float_left"></span>
    <span  class="padding_5"> &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp;</span>
    <span class="float_right"></span>         
</htmlpageheader>      
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" /> 
   
<htmlpagefooter name="myfooter"  class="hide">                          
     <div align="center">
               <br><span class="padding_10">Page {PAGENO} of {nbpg}</span> 
     </div>
</htmlpagefooter>    

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of company-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Company Name</th>
<th>Address</th>
<th>Country</th>
<th>City</th>
<th>State</th>
<th>Zip</th>
<th>File Company Logo</th>
<th>File Report Logo</th>
<th>File Report Background</th>
<th>Report Footer</th>

    </tr>
	<?php foreach($company as $c){ ?>
    <tr>
		<td><?php echo $c['company_name']; ?></td>
<td><?php echo $c['address']; ?></td>
<td><?php echo $c['country']; ?></td>
<td><?php echo $c['city']; ?></td>
<td><?php echo $c['state']; ?></td>
<td><?php echo $c['zip']; ?></td>
<td><?php
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
										</td>
<td><?php
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
										</td>
<td><?php
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
										</td>
<td><?php echo $c['report_footer']; ?></td>

    </tr>
	<?php } ?>
</table>
<!--End of Data display of company//--> 