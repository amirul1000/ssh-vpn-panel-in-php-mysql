<?php

/**
 * Author: Amirul Momenin
 * Desc:Assigned_server Model
 */
class Assigned_server_model extends CI_Model
{
	protected $assigned_server = 'assigned_server';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get assigned_server by id
	 *@param $id - primary key to get record
	 *
     */
    function get_assigned_server($id){
        $result = $this->db->get_where('assigned_server',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('assigned_server');
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
	
    /** Get all assigned_server
	 *
     */
    function get_all_assigned_server(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('assigned_server')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit assigned_server
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_assigned_server($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('assigned_server')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count assigned_server rows
	 *
     */
	function get_count_assigned_server(){
       $result = $this->db->from("assigned_server")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-assigned_server
	 *
     */
    function get_all_users_assigned_server(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('assigned_server')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-assigned_server
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_assigned_server($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('assigned_server')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-assigned_server rows
	 *
     */
	function get_count_users_assigned_server(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("assigned_server")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new assigned_server
	 *@param $params - data set to add record
	 *
     */
    function add_assigned_server($params){
        $this->db->insert('assigned_server',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update assigned_server
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_assigned_server($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('assigned_server',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete assigned_server
	 *@param $id - primary key to delete record
	 *
     */
    function delete_assigned_server($id){
        $status = $this->db->delete('assigned_server',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
