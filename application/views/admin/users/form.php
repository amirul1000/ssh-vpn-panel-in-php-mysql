<a  href="<?php echo site_url('admin/users/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Users'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/users/save/'.$users['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Email" class="col-md-4 control-label">Email</label> 
          <div class="col-md-8"> 
           <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $users['email']); ?>" class="form-control" id="email" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Password" class="col-md-4 control-label">Password</label> 
          <div class="col-md-8"> 
           <input type="text" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $users['password']); ?>" class="form-control" id="password" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Title" class="col-md-4 control-label">Title</label> 
          <div class="col-md-8"> 
           <input type="text" name="title" value="<?php echo ($this->input->post('title') ? $this->input->post('title') : $users['title']); ?>" class="form-control" id="title" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="First Name" class="col-md-4 control-label">First Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $users['first_name']); ?>" class="form-control" id="first_name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Last Name" class="col-md-4 control-label">Last Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $users['last_name']); ?>" class="form-control" id="last_name" /> 
          </div> 
           </div>
<div class="form-group"> 
                                        <label for="File Picture" class="col-md-4 control-label">File Picture</label> 
          <div class="col-md-8"> 
           <input type="file" name="file_picture"  id="file_picture" value="<?php echo ($this->input->post('file_picture') ? $this->input->post('file_picture') : $users['file_picture']); ?>" class="form-control-file"/> 
          </div> 
            </div>
<div class="form-group"> 
          <label for="Phone No" class="col-md-4 control-label">Phone No</label> 
          <div class="col-md-8"> 
           <input type="text" name="phone_no" value="<?php echo ($this->input->post('phone_no') ? $this->input->post('phone_no') : $users['phone_no']); ?>" class="form-control" id="phone_no" /> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Dob" class="col-md-4 control-label">Dob</label> 
            <div class="col-md-8"> 
           <input type="text" name="dob"  id="dob"  value="<?php echo ($this->input->post('dob') ? $this->input->post('dob') : $users['dob']); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>
<div class="form-group"> 
          <label for="Company" class="col-md-4 control-label">Company</label> 
          <div class="col-md-8"> 
           <input type="text" name="company" value="<?php echo ($this->input->post('company') ? $this->input->post('company') : $users['company']); ?>" class="form-control" id="company" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Address" class="col-md-4 control-label">Address</label> 
          <div class="col-md-8"> 
           <input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $users['address']); ?>" class="form-control" id="address" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="City" class="col-md-4 control-label">City</label> 
          <div class="col-md-8"> 
           <input type="text" name="city" value="<?php echo ($this->input->post('city') ? $this->input->post('city') : $users['city']); ?>" class="form-control" id="city" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="State" class="col-md-4 control-label">State</label> 
          <div class="col-md-8"> 
           <input type="text" name="state" value="<?php echo ($this->input->post('state') ? $this->input->post('state') : $users['state']); ?>" class="form-control" id="state" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Zip" class="col-md-4 control-label">Zip</label> 
          <div class="col-md-8"> 
           <input type="text" name="zip" value="<?php echo ($this->input->post('zip') ? $this->input->post('zip') : $users['zip']); ?>" class="form-control" id="zip" /> 
          </div> 
           </div>
<div class="form-group"> 
                                    <label for="Country" class="col-md-4 control-label">Country</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Country_model'); 
             $dataArr = $this->CI->Country_model->get_all_country(); 
          ?> 
          <select name="country_id"  id="country_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($users['country_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['country']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                        <label for="User Type" class="col-md-4 control-label">User Type</label> 
          <div class="col-md-8"> 
           <?php 
             $enumArr = $this->customlib->getEnumFieldValues('users','user_type'); 
           ?> 
           <select name="user_type"  id="user_type"  class="form-control"/> 
             <option value="">--Select--</option> 
             <?php 
              for($i=0;$i<count($enumArr);$i++) 
              { 
             ?> 
             <option value="<?=$enumArr[$i]?>" <?php if($users['user_type']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php 
              } 
             ?> 
           </select> 
          </div> 
            </div>
<div class="form-group"> 
                                        <label for="Status" class="col-md-4 control-label">Status</label> 
          <div class="col-md-8"> 
           <?php 
             $enumArr = $this->customlib->getEnumFieldValues('users','status'); 
           ?> 
           <select name="status"  id="status"  class="form-control"/> 
             <option value="">--Select--</option> 
             <?php 
              for($i=0;$i<count($enumArr);$i++) 
              { 
             ?> 
             <option value="<?=$enumArr[$i]?>" <?php if($users['status']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
             <?php 
              } 
             ?> 
           </select> 
          </div> 
            </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($users['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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