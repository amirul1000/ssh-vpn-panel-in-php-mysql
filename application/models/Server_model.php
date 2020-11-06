<?php

/**
 * Author: Amirul Momenin
 * Desc:Server Model
 */
class Server_model extends CI_Model
{
	protected $server = 'server';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get server by id
	 *@param $id - primary key to get record
	 *
     */
    function get_server($id){
        $result = $this->db->get_where('server',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('server');
			foreach ($fields as $field)
			{
			   $result[$field] = ''; 	  
			}
		}
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all server
	 *
     */
    function get_all_server(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('server')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit server
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_server($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('server')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count server rows
	 *
     */
	function get_count_server(){
       $result = $this->db->from("server")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-server
	 *
     */
    function get_all_users_server(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('server')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-server
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_server($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('server')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-server rows
	 *
     */
	function get_count_users_server(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("server")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new server
	 *@param $params - data set to add record
	 *
     */
    function add_server($params){
        $this->db->insert('server',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update server
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_server($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('server',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete server
	 *@param $id - primary key to delete record
	 *
     */
    function delete_server($id){
        $status = $this->db->delete('server',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
