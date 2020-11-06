<a  href="<?php echo site_url('admin/server/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Server'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/server/save/'.$server['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Name Server" class="col-md-4 control-label">Name Server</label> 
          <div class="col-md-8"> 
           <input type="text" name="name_server" value="<?php echo ($this->input->post('name_server') ? $this->input->post('name_server') : $server['name_server']); ?>" class="form-control" id="name_server" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Ip Address" class="col-md-4 control-label">Ip Address</label> 
          <div class="col-md-8"> 
           <input type="text" name="ip_address" value="<?php echo ($this->input->post('ip_address') ? $this->input->post('ip_address') : $server['ip_address']); ?>" class="form-control" id="ip_address" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Password" class="col-md-4 control-label">Password</label> 
          <div class="col-md-8"> 
           <input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $server['password']); ?>" class="form-control" id="password" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Location" class="col-md-4 control-label">Location</label> 
          <div class="col-md-8"> 
           <input type="text" name="location" value="<?php echo ($this->input->post('location') ? $this->input->post('location') : $server['location']); ?>" class="form-control" id="location" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="ISP" class="col-md-4 control-label">ISP</label> 
          <div class="col-md-8"> 
           <input type="text" name="ISP" value="<?php echo ($this->input->post('ISP') ? $this->input->post('ISP') : $server['ISP']); ?>" class="form-control" id="ISP" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Price" class="col-md-4 control-label">Price</label> 
          <div class="col-md-8"> 
           <input type="text" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $server['price']); ?>" class="form-control" id="price" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="SSH Port" class="col-md-4 control-label">SSH Port</label> 
          <div class="col-md-8"> 
           <input type="text" name="SSH_port" value="<?php echo ($this->input->post('SSH_port') ? $this->input->post('SSH_port') : $server['SSH_port']); ?>" class="form-control" id="SSH_port" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Dropbear Port" class="col-md-4 control-label">Dropbear Port</label> 
          <div class="col-md-8"> 
           <input type="text" name="dropbear_port" value="<?php echo ($this->input->post('dropbear_port') ? $this->input->post('dropbear_port') : $server['dropbear_port']); ?>" class="form-control" id="dropbear_port" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Squid Port" class="col-md-4 control-label">Squid Port</label> 
          <div class="col-md-8"> 
           <input type="text" name="squid_port" value="<?php echo ($this->input->post('squid_port') ? $this->input->post('squid_port') : $server['squid_port']); ?>" class="form-control" id="squid_port" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="VPN Port" class="col-md-4 control-label">VPN Port</label> 
          <div class="col-md-8"> 
           <input type="text" name="VPN_port" value="<?php echo ($this->input->post('VPN_port') ? $this->input->post('VPN_port') : $server['VPN_port']); ?>" class="form-control" id="VPN_port" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Config Open Vpn" class="col-md-4 control-label">Config Open Vpn</label> 
          <div class="col-md-8"> 
           <input type="text" name="config_open_vpn" value="<?php echo ($this->input->post('config_open_vpn') ? $this->input->post('config_open_vpn') : $server['config_open_vpn']); ?>" class="form-control" id="config_open_vpn" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Squid Version" class="col-md-4 control-label">Squid Version</label> 
          <div class="col-md-8"> 
           <input type="text" name="squid_version" value="<?php echo ($this->input->post('squid_version') ? $this->input->post('squid_version') : $server['squid_version']); ?>" class="form-control" id="squid_version" /> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="Note" class="col-md-4 control-label">Note</label> 
          <div class="col-md-8"> 
           <textarea  name="Note"  id="Note"  class="form-control" rows="4"/><?php echo ($this->input->post('Note') ? $this->input->post('Note') : $server['Note']); ?></textarea> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($server['id'])){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>  			