<?php

 /**
 * Author: Amirul Momenin
 * Desc:Users Controller
 *
 */
class Users extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Users_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of users table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['users'] = $this->Users_model->get_limit_users($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/users/index');
		$config['total_rows'] = $this->Users_model->get_count_users();
		$config['per_page'] = 10;
		//Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';		
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
        $data['_view'] = 'admin/users/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save users
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		$file_picture = "";
 
		$created_at = "";
$updated_at = "";

		if($id<=0){
															 $created_at = date("Y-m-d H:i:s");
														 }
else if($id>0){
															 $updated_at = date("Y-m-d H:i:s");
														 }

		$params = array(
					 'email' => html_escape($this->input->post('email')),
'password' => html_escape($this->input->post('password')),
'title' => html_escape($this->input->post('title')),
'first_name' => html_escape($this->input->post('first_name')),
'last_name' => html_escape($this->input->post('last_name')),
'file_picture' => $file_picture,
'phone_no' => html_escape($this->input->post('phone_no')),
'dob' => html_escape($this->input->post('dob')),
'company' => html_escape($this->input->post('company')),
'address' => html_escape($this->input->post('address')),
'city' => html_escape($this->input->post('city')),
'state' => html_escape($this->input->post('state')),
'zip' => html_escape($this->input->post('zip')),
'country_id' => html_escape($this->input->post('country_id')),
'created_at' =>$created_at,
'updated_at' =>$updated_at,
'user_type' => html_escape($this->input->post('user_type')),
'status' => html_escape($this->input->post('status')),

				);
		
						$config['upload_path']          = "./public/uploads/images/users";
						$config['allowed_types']        = "gif|jpg|png";
						$config['max_size']             = 100;
						$config['max_width']            = 1024;
						$config['max_height']           = 768;
						$this->load->library('upload', $config);
						
						if(isset($_POST) && count($_POST) > 0)     
							{  
							  if(strlen($_FILES['file_picture']['name'])>0 && $_FILES['file_picture']['size']>0)
								{
									if ( ! $this->upload->do_upload('file_picture'))
									{
										$error = array('error' => $this->upload->display_errors());
									}
									else
									{
										$file_picture = "uploads/images/users/".$_FILES['file_picture']['name'];
									    $params['file_picture'] = $file_picture;
									}
								}
								else
								{
									unset($params['file_picture']);
								}
							}
							
						    
		if($id>0){
							                        unset($params['created_at']);
						                          }if($id<=0){
							                        unset($params['updated_at']);
						                          } 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['users'] = $this->Users_model->get_users($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Users_model->update_users($id,$params);
				$this->session->set_flashdata('msg','Users has been updated successfully');
                redirect('admin/users/index');
            }else{
                $data['_view'] = 'admin/users/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $users_id = $this->Users_model->add_users($params);
				$this->session->set_flashdata('msg','Users has been saved successfully');
                redirect('admin/users/index');
            }else{  
			    $data['users'] = $this->Users_model->get_users(0);
                $data['_view'] = 'admin/users/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details users
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['users'] = $this->Users_model->get_users($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/users/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting users
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $users = $this->Users_model->get_users($id);

        // check if the users exists before trying to delete it
        if(isset($users['id'])){
            $this->Users_model->delete_users($id);
			$this->session->set_flashdata('msg','Users has been deleted successfully');
            redirect('admin/users/index');
        }
        else
            show_error('The users you are trying to delete does not exist.');
    }
	
	/**
     * Search users
	 * @param $start - Starting of users table's index to get query
     */
	function search($start=0){
		if(!empty($this->input->post('key'))){
			$key =$this->input->post('key');
			$_SESSION['key'] = $key;
		}else{
			$key = $_SESSION['key'];
		}
		
		$limit = 10;		
		$this->db->like('id', $key, 'both');
$this->db->or_like('email', $key, 'both');
$this->db->or_like('password', $key, 'both');
$this->db->or_like('title', $key, 'both');
$this->db->or_like('first_name', $key, 'both');
$this->db->or_like('last_name', $key, 'both');
$this->db->or_like('file_picture', $key, 'both');
$this->db->or_like('phone_no', $key, 'both');
$this->db->or_like('dob', $key, 'both');
$this->db->or_like('company', $key, 'both');
$this->db->or_like('address', $key, 'both');
$this->db->or_like('city', $key, 'both');
$this->db->or_like('state', $key, 'both');
$this->db->or_like('zip', $key, 'both');
$this->db->or_like('country_id', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');
$this->db->or_like('user_type', $key, 'both');
$this->db->or_like('status', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['users'] = $this->db->get('users')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/users/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('email', $key, 'both');
$this->db->or_like('password', $key, 'both');
$this->db->or_like('title', $key, 'both');
$this->db->or_like('first_name', $key, 'both');
$this->db->or_like('last_name', $key, 'both');
$this->db->or_like('file_picture', $key, 'both');
$this->db->or_like('phone_no', $key, 'both');
$this->db->or_like('dob', $key, 'both');
$this->db->or_like('company', $key, 'both');
$this->db->or_like('address', $key, 'both');
$this->db->or_like('city', $key, 'both');
$this->db->or_like('state', $key, 'both');
$this->db->or_like('zip', $key, 'both');
$this->db->or_like('country_id', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');
$this->db->or_like('user_type', $key, 'both');
$this->db->or_like('status', $key, 'both');

		$config['total_rows'] = $this->db->from("users")->count_all_results();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$config['per_page'] = 10;
		// Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
		$data['key'] = $key;
		$data['_view'] = 'admin/users/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export users
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'users_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $usersData = $this->Users_model->get_all_users();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Email","Password","Title","First Name","Last Name","File Picture","Phone No","Dob","Company","Address","City","State","Zip","Country Id","Created At","Updated At","User Type","Status"); 
		   fputcsv($file, $header);
		   foreach ($usersData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $users = $this->db->get('users')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/users/print_template.php');
			$html = ob_get_clean();
			include(APPPATH."third_party/mpdf60/mpdf.php");					
			$mpdf=new mPDF('','A4'); 
			//$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
			//$mpdf->mirrorMargins = true;
		    $mpdf->SetDisplayMode('fullpage');
			//==============================================================
			$mpdf->autoScriptToLang = true;
			$mpdf->baseScript = 1;	// Use values in classes/ucdn.php  1 = LATIN
			$mpdf->autoVietnamese = true;
			$mpdf->autoArabic = true;
			$mpdf->autoLangToFont = true;
			$mpdf->setAutoBottomMargin = 'stretch';
			$stylesheet = file_get_contents(APPPATH."third_party/mpdf60/lang2fonts.css");
			$mpdf->WriteHTML($stylesheet,1);
			$mpdf->WriteHTML($html);
			//$mpdf->AddPage();
			$mpdf->Output($filePath);
			$mpdf->Output();
			//$mpdf->Output( $filePath,'S');
			exit;	
	  }
	   
	}
}
//End of Users controller