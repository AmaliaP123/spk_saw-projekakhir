<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:53
 */
class MNilai extends CI_Model
{

    public $kdPelamar;
    public $kdKriteria;
    public $nilai;

    public function __construct()
    {
        parent::__construct();
    }

    private function getTable()
    {
        return 'tbl_seleksi';
    }

    private function getData()
    {
        $data = array(
            'kdPelamar' => $this->kdPelamar,
            'kdKriteria' => $this->kdKriteria,
            'nilai' => $this->nilai
        );

        return $data;
    }

    public function insert()
    {
        $status = $this->db->insert($this->getTable(), $this->getData());
        return $status;
    }

    public function getNilaiByPelamar($id)
    {
        $query = $this->db->query(
            'select u.kdPelamar, u.nik, u.nama, u.alamat, u.notelp, k.kdKriteria, n.nilai from tbl_pelamar u, tbl_seleksi n, tbl_kriteria k, tbl_subkriteria sk where u.kdPelamar = n.kdPelamar AND k.kdKriteria = n.kdKriteria and k.kdKriteria = sk.kdKriteria and u.kdPelamar = ' . $id . ' GROUP by n.nilai '
        );
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function getPelamar($id)
    {
        $query = $this->db->query(
            'select * from tbl_pelamar where kdPelamar = ' . $id
        );
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function getNilaiPelamar()
    {
        $query = $this->db->query(
            'select u.kdPelamar, u.nik, u.nama, u.alamat, u.notelp, k.kdKriteria, k.kriteria ,n.nilai from tbl_pelamar u, tbl_seleksi n, tbl_kriteria k where u.kdPelamar = n.kdPelamar AND k.kdKriteria = n.kdKriteria '
        );
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function update()
    {
        $data = array(
            'nilai' => $this->nilai,
            'kdPelamar' => $this->kdPelamar,
            'kdKriteria' => $this->kdKriteria

        );
        $this->db->where('kdPelamar', $this->kdPelamar);
        $this->db->where('kdKriteria', $this->kdKriteria);
        $this->db->delete($this->getTable());

        $this->db->insert($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('kdPelamar', $id);
        return $this->db->delete($this->getTable());
    }
}
