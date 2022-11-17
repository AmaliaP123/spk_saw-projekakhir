<?php

class Crud_model extends CI_Model {
private $db;

public function __construct()
    {
        parent::__construct();
         $this->db = $this->load->database('default', TRUE);
    }

    function create($table, $data) {
        $this->db->insert($table, $data);
    }

    function create2($table, $data) {
        $this->db->insert($table, $data);
    }

    function read($table,$where=null,$order=null) {
        if($where==null && $order==null){
            return $this->db->get($table)->result_array();
        }else if($where!=null && $order==null){
            return $this->db->where($where)->get($table)->result_array();
        }else if($where==null && $order!=null){
            return $this->db->order_by($order)->get($table)->result_array();
        }else{
            return $this->db->where($where)->order_by($order)->get($table)->result_array();
        }
    }

  

    function update($table, $where, $data) {
        $this->db->where($where)->update($table, $data);
    }

  

    function delete($table, $where) {
        $this->db->where($where)->delete($table);
    }

   
    
    function find($table, $where){
        return $this->db->where($where)->get($table)->result_array();
    }

 
}
