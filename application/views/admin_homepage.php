<div class="row">
	
    <div class="col-12 col-sm-6 col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>
				<?php
    // $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Users_model');
    $total = $this->CI->Users_model->get_count_users();
    ?> 
                <h4 class="card-title">Users</h4>
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="text-dark font-18 mb-0"><?=$total?></h2>
					<div
						class="text-success font-weight-bold d-flex justify-content-between align-items-center">
						<i class="fa fa-arrow-right mr-1"></i> <span
							class=" text-extra-small"> <a
							href="<?php echo site_url('admin/users/index'); ?>">View</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <div class="col-12 col-sm-6 col-md-6 col-xl-3">
		<div class="card">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>
				<?php
    // $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Country_model');
    $total = $this->CI->Country_model->get_count_country();
    ?> 
                <h4 class="card-title">Country</h4>
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="text-dark font-18 mb-0"><?=$total?></h2>
					<div
						class="text-success font-weight-bold d-flex justify-content-between align-items-center">
						<i class="fa fa-arrow-right mr-1"></i> <span
							class=" text-extra-small"> <a
							href="<?php echo site_url('admin/country/index'); ?>">View</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    
    
    
    
    
    
</div>