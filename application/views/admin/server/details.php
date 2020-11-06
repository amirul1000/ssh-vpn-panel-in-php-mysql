<a  href="<?php echo site_url('admin/server/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Server'); ?></h5>
<!--Data display of server with id--> 
<?php
	$c = $server;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Name Server</td><td><?php echo $c['name_server']; ?></td></tr>

<tr><td>Ip Address</td><td><?php echo $c['ip_address']; ?></td></tr>

<tr><td>Password</td><td><?php echo $c['password']; ?></td></tr>

<tr><td>Location</td><td><?php echo $c['location']; ?></td></tr>

<tr><td>ISP</td><td><?php echo $c['ISP']; ?></td></tr>

<tr><td>Price</td><td><?php echo $c['price']; ?></td></tr>

<tr><td>SSH Port</td><td><?php echo $c['SSH_port']; ?></td></tr>

<tr><td>Dropbear Port</td><td><?php echo $c['dropbear_port']; ?></td></tr>

<tr><td>Squid Port</td><td><?php echo $c['squid_port']; ?></td></tr>

<tr><td>VPN Port</td><td><?php echo $c['VPN_port']; ?></td></tr>

<tr><td>Config Open Vpn</td><td><?php echo $c['config_open_vpn']; ?></td></tr>

<tr><td>Squid Version</td><td><?php echo $c['squid_version']; ?></td></tr>

<tr><td>Note</td><td><?php echo $c['Note']; ?></td></tr>


</table>
<!--End of Data display of server with id//--> 