<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:54
 */
class MSeleksi extends CI_Model{

    public $kdPelamar;
    public $kdKriteria;
    public $nilai;


    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'tbl_seleksi';
    }

    private function getData(){
        $data = array(
            'kdPelamar' => $this->kdPelamar,
            'kdKriteria' => $this->kdKriteria,
            'nilai' => $this->nilai
        );
        return $data;
    }

    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $seleksis[] = $row;
            }

            return$seleksis;
        }
    }

    public function getById()
    {
        $this->db->where('kdPelamar', $this->kdPelamar);
        $query = $this->db->get($this->getTable());

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $seleksi[] = $row;
            }

            return $seleksi;
        }
    }

    public function getNilaiByPelamar()
    {
        $query = $this->db->query(
            'select u.*, k.*, n.*, sk.* from tbl_pelamar u, tbl_seleksi n, tbl_kriteria k, tbl_subkriteria sk where u.kdPelamar = n.kdPelamar AND k.kdKriteria = n.kdKriteria and k.kdKriteria = sk.kdKriteria and n.nilai = sk.value and u.kdPelamar = '.$this->kdPelamar
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $seleksi[] = $row;
            }

            return $seleksi;
        }
    }

    public function insert()
    {
        $data = $this->getData();
        $this->db->insert($this->getTable(), $data);
        return $this->db->insert_id();
    }

    public function update()
    {
        $data = $this->getData();
        $this->db->where('kdKriteria', $this->kdKriteria);
        $this->db->where('kdPelamar', $this->kdPelamar);
        $this->db->update($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kdPelamar', $id);
        return $this->db->delete($this->getTable());
    }
}