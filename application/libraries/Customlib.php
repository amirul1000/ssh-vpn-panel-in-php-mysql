<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Customlib {
	private $CI;

   function __construct() {
       $this->CI =& get_instance();
       $this->CI->load->database();	
   }

 /*
  Get Enum Value
 */
  function getEnumFieldValues($tableName = null, $field = null)
   {
	   
       // Make a DDL query
        $sql = "SHOW COLUMNS FROM $tableName LIKE " . $this->q($field);
        $query = $this->CI->db->query($sql);
		$data = $query->row();
       if(preg_match("('.*')", $data->Type, $match))
       {
          $enumStr       = str_replace("'", '', $match[0]);
          $enumValueList = explode(',', $enumStr);
       }

       return $enumValueList;
   }
   
   function q($str = null)
	   {
		  return "'" . mysqli_escape_string($this->CI->db->conn_id,$str) . "'";
	   }

   function   debug($var)
	 {
       echo "<pre>";
	      print_r($var);
	   echo "</pre>";
     }
 }
?>