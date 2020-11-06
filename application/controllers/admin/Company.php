<?php

 /**
 * Author: Amirul Momenin
 * Desc:Company Controller
 *
 */
class Company extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Company_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of company table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['company'] = $this->Company_model->get_limit_company($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/company/index');
		$config['total_rows'] = $this->Company_model->get_count_company();
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
		
        $data['_view'] = 'admin/company/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save company
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		$file_company_logo = "";
$file_report_logo = "";
$file_report_background = "";
 
		
		
		$params = array(
					 'company_name' => html_escape($this->input->post('company_name')),
'address' => html_escape($this->input->post('address')),
'country' => html_escape($this->input->post('country')),
'city' => html_escape($this->input->post('city')),
'state' => html_escape($this->input->post('state')),
'zip' => html_escape($this->input->post('zip')),
'file_company_logo' => $file_company_logo,
'file_report_logo' => $file_report_logo,
'file_report_background' => $file_report_background,
'report_footer' => html_escape($this->input->post('report_footer')),

				);
		
						$config['upload_path']          = "./public/uploads/images/company";
						$config['allowed_types']        = "gif|jpg|png";
						$config['max_size']             = 100;
						$config['max_width']            = 1024;
						$config['max_height']           = 768;
						$this->load->library('upload', $config);
						
						if(isset($_POST) && count($_POST) > 0)     
							{  
							  if(strlen($_FILES['file_company_logo']['name'])>0 && $_FILES['file_company_logo']['size']>0)
								{
									if ( ! $this->upload->do_upload('file_company_logo'))
									{
										$error = array('error' => $this->upload->display_errors());
									}
									else
									{
										$file_company_logo = "uploads/images/company/".$_FILES['file_company_logo']['name'];
									    $params['file_company_logo'] = $file_company_logo;
									}
								}
								else
								{
									unset($params['file_company_logo']);
								}
							}
							
						   
						$config['upload_path']          = "./public/uploads/images/company";
						$config['allowed_types']        = "gif|jpg|png";
						$config['max_size']             = 100;
						$config['max_width']            = 1024;
						$config['max_height']           = 768;
						$this->load->library('upload', $config);
						
						if(isset($_POST) && count($_POST) > 0)     
							{  
							  if(strlen($_FILES['file_report_logo']['name'])>0 && $_FILES['file_report_logo']['size']>0)
								{
									if ( ! $this->upload->do_upload('file_report_logo'))
									{
										$error = array('error' => $this->upload->display_errors());
									}
									else
									{
										$file_report_logo = "uploads/images/company/".$_FILES['file_report_logo']['name'];
									    $params['file_report_logo'] = $file_report_logo;
									}
								}
								else
								{
									unset($params['file_report_logo']);
								}
							}
							
						   
						$config['upload_path']          = "./public/uploads/images/company";
						$config['allowed_types']        = "gif|jpg|png";
						$config['max_size']             = 100;
						$config['max_width']            = 1024;
						$config['max_height']           = 768;
						$this->load->library('upload', $config);
						
						if(isset($_POST) && count($_POST) > 0)     
							{  
							  if(strlen($_FILES['file_report_background']['name'])>0 && $_FILES['file_report_background']['size']>0)
								{
									if ( ! $this->upload->do_upload('file_report_background'))
									{
										$error = array('error' => $this->upload->display_errors());
									}
									else
									{
										$file_report_background = "uploads/images/company/".$_FILES['file_report_background']['name'];
									    $params['file_report_background'] = $file_report_background;
									}
								}
								else
								{
									unset($params['file_report_background']);
								}
							}
							
						    
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['company'] = $this->Company_model->get_company($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Company_model->update_company($id,$params);
				$this->session->set_flashdata('msg','Company has been updated successfully');
                redirect('admin/company/index');
            }else{
                $data['_view'] = 'admin/company/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $company_id = $this->Company_model->add_company($params);
				$this->session->set_flashdata('msg','Company has been saved successfully');
                redirect('admin/company/index');
            }else{  
			    $data['company'] = $this->Company_model->get_company(0);
                $data['_view'] = 'admin/company/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details company
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['company'] = $this->Company_model->get_company($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/company/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting company
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $company = $this->Company_model->get_company($id);

        // check if the company exists before trying to delete it
        if(isset($company['id'])){
            $this->Company_model->delete_company($id);
			$this->session->set_flashdata('msg','Company has been deleted successfully');
            redirect('admin/company/index');
        }
        else
            show_error('The company you are trying to delete does not exist.');
    }
	
	/**
     * Search company
	 * @param $start - Starting of company table's index to get query
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
$this->db->or_like('company_name', $key, 'both');
$this->db->or_like('address', $key, 'both');
$this->db->or_like('country', $key, 'both');
$this->db->or_like('city', $key, 'both');
$this->db->or_like('state', $key, 'both');
$this->db->or_like('zip', $key, 'both');
$this->db->or_like('file_company_logo', $key, 'both');
$this->db->or_like('file_report_logo', $key, 'both');
$this->db->or_like('file_report_background', $key, 'both');
$this->db->or_like('report_footer', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['company'] = $this->db->get('company')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/company/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('company_name', $key, 'both');
$this->db->or_like('address', $key, 'both');
$this->db->or_like('country', $key, 'both');
$this->db->or_like('city', $key, 'both');
$this->db->or_like('state', $key, 'both');
$this->db->or_like('zip', $key, 'both');
$this->db->or_like('file_company_logo', $key, 'both');
$this->db->or_like('file_report_logo', $key, 'both');
$this->db->or_like('file_report_background', $key, 'both');
$this->db->or_like('report_footer', $key, 'both');

		$config['total_rows'] = $this->db->from("company")->count_all_results();
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
		$data['_view'] = 'admin/company/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export company
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'company_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $companyData = $this->Company_model->get_all_company();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Company Name","Address","Country","City","State","Zip","File Company Logo","File Report Logo","File Report Background","Report Footer"); 
		   fputcsv($file, $header);
		   foreach ($companyData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $company = $this->db->get('company')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/company/print_template.php');
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
//End of Company controller