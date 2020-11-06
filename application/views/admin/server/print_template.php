<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Server'); ?></h3>
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
<!--Data display of server-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
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

    </tr>
	<?php } ?>
</table>
<!--End of Data display of server//--> 