<?php

/**
 * Author: Amirul Momenin
 * Desc:Users Model
 */
class Users_model extends CI_Model
{
	protected $users = 'users';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get users by id
	 *@param $id - primary key to get record
	 *
     */
    function get_users($id){
        $result = $this->db->get_where('users',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('users');
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
	
    /** Get all users
	 *
     */
    function get_all_users(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('users')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('users')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users rows
	 *
     */
	function get_count_users(){
       $result = $this->db->from("users")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-users
	 *
     */
    function get_all_users_users(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('users')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-users
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_users($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('users')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-users rows
	 *
     */
	function get_count_users_users(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("users")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new users
	 *@param $params - data set to add record
	 *
     */
    function add_users($params){
        $this->db->insert('users',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update users
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_users($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('users',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete users
	 *@param $id - primary key to delete record
	 *
     */
    function delete_users($id){
        $status = $this->db->delete('users',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
