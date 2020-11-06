<?php

/**
 * Author: Amirul Momenin
 * Desc:Country Model
 */
class Country_model extends CI_Model
{
	protected $country = 'country';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get country by id
	 *@param $id - primary key to get record
	 *
     */
    function get_country($id){
        $result = $this->db->get_where('country',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('country');
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
	
    /** Get all country
	 *
     */
    function get_all_country(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('country')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit country
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_country($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('country')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count country rows
	 *
     */
	function get_count_country(){
       $result = $this->db->from("country")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-country
	 *
     */
    function get_all_users_country(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('country')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-country
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_country($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('country')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-country rows
	 *
     */
	function get_count_users_country(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("country")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new country
	 *@param $params - data set to add record
	 *
     */
    function add_country($params){
        $this->db->insert('country',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update country
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_country($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('country',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete country
	 *@param $id - primary key to delete record
	 *
     */
    function delete_country($id){
        $status = $this->db->delete('country',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
