<a  href="<?php echo site_url('admin/payment/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Payment'); ?></h5>
<!--Data display of payment with id--> 
<?php
	$c = $payment;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['users_id']);
									   echo $dataArr['email'];?>
									</td></tr>

<tr><td>Amount</td><td><?php echo $c['amount']; ?></td></tr>

<tr><td>Active Date</td><td><?php echo $c['active_date']; ?></td></tr>

<tr><td>End Date</td><td><?php echo $c['end_date']; ?></td></tr>


</table>
<!--End of Data display of payment with id//--> 