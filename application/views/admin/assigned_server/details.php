<a  href="<?php echo site_url('admin/assigned_server/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Assigned_server'); ?></h5>
<!--Data display of assigned_server with id--> 
<?php
	$c = $assigned_server;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['users_id']);
									   echo $dataArr['email'];?>
									</td></tr>

<tr><td>Server</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Server_model');
									   $dataArr = $this->CI->Server_model->get_server($c['server_id']);
									   echo $dataArr['name_server'];?>
									</td></tr>


</table>
<!--End of Data display of assigned_server with id//--> 