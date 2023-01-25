<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seleksi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Penilaian Seleksi');
        $this->load->model('MPelamar');
        $this->load->model('MSeleksi');
        $this->load->model('MKriteria');
        $this->load->model('MSubKriteria');
        $this->load->model('MNilai');
        $this->page->setLoadJs('assets/js/pelamar');
    }



    public function index($date = null)
    {

        if ($date == null) {
            $where = array(
                'MONTH(periode)' => date('m'),
                'YEAR(periode)' => date('Y'),
            );
        } else {
            $where = array(
                'MONTH(periode)' => explode('-', $date)[1],
                'YEAR(periode)' => explode('-', $date)[0],
            );
        }

        $data['pelamar'] = $this->MPelamar->getAll($where);
        loadPage('seleksi/index', $data);
    }

    public function penilaian($id = null)
    {

        if (count($_POST)) {
            $kode = $this->input->post('kdPelamar');
            $success = false;
            $kdPelamar = $this->uri->segment(3, 0);
            dump($kdPelamar);
            if ($kdPelamar > 0) {
                $nama = $this->input->post('nama');
                $nilai = $this->input->post('nilai');
                $where = array('kdPelamar' => $kdPelamar);

                foreach ($nilai as $item => $value) {
                    $this->MNilai->kdPelamar = $kdPelamar;
                    $this->MNilai->kdKriteria = $item;
                    $this->MNilai->nilai = $value;
                    if ($this->MNilai->update()) {
                        $success = true;
                    }
                }


                $berkas = array(
                    'ijazah' => $this->input->post('ijazah'),
                    'kk' => $this->input->post('kk'),
                    'ktp' => $this->input->post('ktp'),
                    'lamaran' => $this->input->post('lamaran'),
                    'sehat' => $this->input->post('sehat'),
                    'foto' => $this->input->post('foto'),
                    'cv' => $this->input->post('cv'),
                    'kdPelamar' => $kdPelamar


                );
                $this->db->delete('tbl_berkas', array('kdPelamar' => $kdPelamar));
                $this->db->insert('tbl_berkas',  $berkas);



                if ($success == true) {
                    $this->session->set_flashdata('message', 'Berhasil mengubah data :)');
                    redirect('seleksi');
                } else {
                    // echo 'gagal';
                }
            }
        }
        $data['dataView'] = $this->getDataInsert();
        $data['nilaiPelamar'] = $this->MNilai->getPelamar($id);
        $data['nilaiSeleksi'] = $this->MNilai->getNilaiByPelamar($id);
        loadPage('seleksi/tambah', $data);
    }



    public function getById($kode)
    {
        $this->MPelamar->kdPelamar = $kode;
        $data = $this->MPelamar->getById();
        echo json_encode($data);
    }

    public function getSubById($kode)
    {
        $this->MSeleksi->kdPelamar = $kode;
        $data = $this->MSeleksi->getById();
        $data['dataView'] = $this->getDataInsert();
        $data['nilaiUniversitas'] = $this->MNilai->getNilaiByPelamar($kode);
        echo json_encode(array('param' => $data, 'kode' => $kode));
    }

    private function getDataInsert()
    {
        $dataView = array();
        $kriteria = $this->MKriteria->getAll();
        foreach ($kriteria as $item) {
            $this->MSubKriteria->kdKriteria = $item->kdKriteria;
            $dataView[$item->kdKriteria] = array(
                'nama' => $item->kriteria,
                'data' => $this->MSubKriteria->getById()
            );
        }

        return $dataView;
    }

    public function detail($kode)
    {
        $this->MPelamar->kdPelamar = $kode;
        $data['pelamar'] = $this->MPelamar->getById();
        $this->MSeleksi->kdPelamar = $kode;
        $data['seleksi'] = $this->MSeleksi->getNilaiByPelamar($kode);

        echo json_encode($data);
    }
}
