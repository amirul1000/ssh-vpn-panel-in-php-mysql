<a  href="<?php echo site_url('admin/payment/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Payment'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/payment/save/'.$payment['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
                                    <label for="Users" class="col-md-4 control-label">Users</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Users_model'); 
             $dataArr = $this->CI->Users_model->get_all_users(); 
          ?> 
          <select name="users_id"  id="users_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($payment['users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Amount" class="col-md-4 control-label">Amount</label> 
          <div class="col-md-8"> 
           <input type="text" name="amount" value="<?php echo ($this->input->post('amount') ? $this->input->post('amount') : $payment['amount']); ?>" class="form-control" id="amount" /> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Active Date" class="col-md-4 control-label">Active Date</label> 
            <div class="col-md-8"> 
           <input type="text" name="active_date"  id="active_date"  value="<?php echo ($this->input->post('active_date') ? $this->input->post('active_date') : $payment['active_date']); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>
<div class="form-group"> 
                                       <label for="End Date" class="col-md-4 control-label">End Date</label> 
            <div class="col-md-8"> 
           <input type="text" name="end_date"  id="end_date"  value="<?php echo ($this->input->post('end_date') ? $this->input->post('end_date') : $payment['end_date']); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($payment['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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