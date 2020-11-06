<?php

 /**
 * Author: Amirul Momenin
 * Desc:Server Controller
 *
 */
class Server extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Server_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of server table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['server'] = $this->Server_model->get_limit_server($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/server/index');
		$config['total_rows'] = $this->Server_model->get_count_server();
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
		
        $data['_view'] = 'admin/server/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save server
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'name_server' => html_escape($this->input->post('name_server')),
'ip_address' => html_escape($this->input->post('ip_address')),
'password' => html_escape($this->input->post('password')),
'location' => html_escape($this->input->post('location')),
'ISP' => html_escape($this->input->post('ISP')),
'price' => html_escape($this->input->post('price')),
'SSH_port' => html_escape($this->input->post('SSH_port')),
'dropbear_port' => html_escape($this->input->post('dropbear_port')),
'squid_port' => html_escape($this->input->post('squid_port')),
'VPN_port' => html_escape($this->input->post('VPN_port')),
'config_open_vpn' => html_escape($this->input->post('config_open_vpn')),
'squid_version' => html_escape($this->input->post('squid_version')),
'Note' => html_escape($this->input->post('Note')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['server'] = $this->Server_model->get_server($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Server_model->update_server($id,$params);
				$this->session->set_flashdata('msg','Server has been updated successfully');
                redirect('admin/server/index');
            }else{
                $data['_view'] = 'admin/server/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $server_id = $this->Server_model->add_server($params);
				$this->session->set_flashdata('msg','Server has been saved successfully');
                redirect('admin/server/index');
            }else{  
			    $data['server'] = $this->Server_model->get_server(0);
                $data['_view'] = 'admin/server/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details server
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['server'] = $this->Server_model->get_server($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/server/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting server
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $server = $this->Server_model->get_server($id);

        // check if the server exists before trying to delete it
        if(isset($server['id'])){
            $this->Server_model->delete_server($id);
			$this->session->set_flashdata('msg','Server has been deleted successfully');
            redirect('admin/server/index');
        }
        else
            show_error('The server you are trying to delete does not exist.');
    }
	
	/**
     * Search server
	 * @param $start - Starting of server table's index to get query
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
$this->db->or_like('name_server', $key, 'both');
$this->db->or_like('ip_address', $key, 'both');
$this->db->or_like('password', $key, 'both');
$this->db->or_like('location', $key, 'both');
$this->db->or_like('ISP', $key, 'both');
$this->db->or_like('price', $key, 'both');
$this->db->or_like('SSH_port', $key, 'both');
$this->db->or_like('dropbear_port', $key, 'both');
$this->db->or_like('squid_port', $key, 'both');
$this->db->or_like('VPN_port', $key, 'both');
$this->db->or_like('config_open_vpn', $key, 'both');
$this->db->or_like('squid_version', $key, 'both');
$this->db->or_like('Note', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['server'] = $this->db->get('server')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/server/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('name_server', $key, 'both');
$this->db->or_like('ip_address', $key, 'both');
$this->db->or_like('password', $key, 'both');
$this->db->or_like('location', $key, 'both');
$this->db->or_like('ISP', $key, 'both');
$this->db->or_like('price', $key, 'both');
$this->db->or_like('SSH_port', $key, 'both');
$this->db->or_like('dropbear_port', $key, 'both');
$this->db->or_like('squid_port', $key, 'both');
$this->db->or_like('VPN_port', $key, 'both');
$this->db->or_like('config_open_vpn', $key, 'both');
$this->db->or_like('squid_version', $key, 'both');
$this->db->or_like('Note', $key, 'both');

		$config['total_rows'] = $this->db->from("server")->count_all_results();
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
		$data['_view'] = 'admin/server/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export server
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'server_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $serverData = $this->Server_model->get_all_server();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Name Server","Ip Address","Password","Location","ISP","Price","SSH Port","Dropbear Port","Squid Port","VPN Port","Config Open Vpn","Squid Version","Note"); 
		   fputcsv($file, $header);
		   foreach ($serverData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $server = $this->db->get('server')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/server/print_template.php');
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
//End of Server controller