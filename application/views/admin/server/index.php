<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Server'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/server/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/server/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/server/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of server-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Name Server</th>
<th>Ip Address</th>
<th>Password</th>
<th>Location</th>
<th>ISP</th>
<th>Price</th>
<th>SSH Port</th>
<th>Dropbear Port</th>
<th>Squid Port</th>
<th>VPN Port</th>
<th>Config Open Vpn</th>
<th>Squid Version</th>
<th>Note</th>

		<th>Actions</th>
    </tr>
	<?php foreach($server as $c){ ?>
    <tr>
		<td><?php echo $c['name_server']; ?></td>
<td><?php echo $c['ip_address']; ?></td>
<td><?php echo $c['password']; ?></td>
<td><?php echo $c['location']; ?></td>
<td><?php echo $c['ISP']; ?></td>
<td><?php echo $c['price']; ?></td>
<td><?php echo $c['SSH_port']; ?></td>
<td><?php echo $c['dropbear_port']; ?></td>
<td><?php echo $c['squid_port']; ?></td>
<td><?php echo $c['VPN_port']; ?></td>
<td><?php echo $c['config_open_vpn']; ?></td>
<td><?php echo $c['squid_version']; ?></td>
<td><?php echo $c['Note']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/server/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/server/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/server/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of server//--> 

<!--No data-->
<?php
	if(count($server)==0){
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
