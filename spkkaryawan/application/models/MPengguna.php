<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:51
 */

class MPengguna extends CI_Model{

    public $user_id;
    public $user_nama;
    public $user_username;
    public $user_password;
    public $user_level;

    public function __construct(){
        parent::__construct();
    }

    private function getTable(){
        return 'tbl_pengguna';
    }

    private function getData(){
        $data = array(
            'user_nama' => $this->user_nama,
            'user_username' => $this->user_username,
            'user_password' => $this->user_password,
            'user_level' => $this->user_level
        );

        return $data;
    }

    public function getAll()
    {
        $penggunas = array();
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $penggunas[] = $row;
            }
        }
        return $penggunas;
    }

    public function getById()
    {

        $this->db->from($this->getTable());
        $this->db->where('user_id',$this->user_id);
        $query = $this->db->get();

        return $query->row();
    }

    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $status = $this->db->update($this->getTable(), $this->getData(), $where);
        return $status;

    }

    public function delete($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID(){
        $this->db->select('user_id');
        $this->db->order_by('user_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }


}