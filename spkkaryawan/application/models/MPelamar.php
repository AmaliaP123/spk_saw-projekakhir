<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:51
 */

class MPelamar extends CI_Model{

    public $kdPelamar;
    public $nik;
    public $nama;
    public $alamat;
    public $notelp;

    public function __construct(){
        parent::__construct();
    }

    private function getTable(){
        return 'tbl_pelamar';
    }

    private function getData(){
        $data = array(
            'nik' => $this->nik,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'notelp' => $this->notelp
        );

        return $data;
    }

    public function getAll()
    {
        $pelamar = array();
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $pelamar[] = $row;
            }
        }
        return $pelamar;
    }

    public function getById()
    {

        $this->db->from($this->getTable());
        $this->db->where('kdPelamar',$this->kdPelamar);
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
        $this->db->where('kdPelamar', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID(){
        $this->db->select('kdPelamar');
        $this->db->order_by('kdPelamar', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }


}