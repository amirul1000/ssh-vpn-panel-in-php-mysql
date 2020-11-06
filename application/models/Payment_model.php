<?php

/**
 * Author: Amirul Momenin
 * Desc:Payment Model
 */
class Payment_model extends CI_Model
{
	protected $payment = 'payment';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get payment by id
	 *@param $id - primary key to get record
	 *
     */
    function get_payment($id){
        $result = $this->db->get_where('payment',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('payment');
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
	
    /** Get all payment
	 *
     */
    function get_all_payment(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('payment')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit payment
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_payment($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('payment')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count payment rows
	 *
     */
	function get_count_payment(){
       $result = $this->db->from("payment")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-payment
	 *
     */
    function get_all_users_payment(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('payment')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-payment
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_payment($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('payment')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-payment rows
	 *
     */
	function get_count_users_payment(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("payment")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new payment
	 *@param $params - data set to add record
	 *
     */
    function add_payment($params){
        $this->db->insert('payment',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update payment
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_payment($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('payment',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete payment
	 *@param $id - primary key to delete record
	 *
     */
    function delete_payment($id){
        $status = $this->db->delete('payment',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
