<?php

 /**
 * Author: Amirul Momenin
 * Desc:Users Controller
 *
 */
class Profile extends CI_Controller{
    function __construct()
    {
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
	 *
	 */
    function index()
    {
		$limit = 10;
        $data['users'] = $this->Users_model->get_users($this->session->userdata['id']);
        $data['_view'] = 'admin/profile/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /*
     * Save users
     */
    function save($id=-1)
    {   
		$file_picture = "";
 
		
		$params = array(
						'email' =>$this->input->post('email'),
						'title' =>$this->input->post('title'),
						'first_name' =>$this->input->post('first_name'),
						'last_name' =>$this->input->post('last_name'),
						'file_picture' =>$file_picture,
						'phone_no' =>$this->input->post('phone_no'),
						'dob' =>$this->input->post('dob'),
						'company' =>$this->input->post('company'),
						'address' =>$this->input->post('address'),
						'city' =>$this->input->post('city'),
						'state' =>$this->input->post('state'),
						'zip' =>$this->input->post('zip'),
						'country_id' =>$this->input->post('country_id'),
						'updated_at' =>date("Y-m-d H:i:s"),
						
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
							
						    
		//update		
        if(isset($id) && $id>0)
        {
			$data['users'] = $this->Users_model->get_users($id);
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $this->Users_model->update_users($id,$params);            
                redirect('admin/profile/index');
            }
            else
            {
                $data['_view'] = 'admin/profile/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else
		{
			if(isset($_POST) && count($_POST) > 0)     
            {   
                $users_id = $this->Users_model->add_users($params);
                redirect('admin/profile/index');
            }
            else
            {  
			    $data['users'] = $this->Users_model->get_users(0);
                $data['_view'] = 'admin/profile/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
    
}
