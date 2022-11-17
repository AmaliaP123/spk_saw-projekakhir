<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:42
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pelamar extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Data Pelamar');
        $this->load->model('MPelamar');
        $this->page->setLoadJs('assets/js/pelamar');
    }

    public function index()
    {
        $data['pelamar'] = $this->MPelamar->getAll();
        loadPage('pelamar/index',$data);
    
    }

    public function cetak()
    {
        $data['pelamar'] = $this->MPelamar->getAll();
        $this->load->view('pelamar/printpelamar', $data);
    }

private function getValidationUpdatePelamar()
    {
        $validation = array(
            array('field' => 'kdPelamar', 'label' => '', 'rules' => 'required|integer'),
            array('field' => 'nik', 'label' => '', 'rules' => 'trim|required'),
            array('field' => 'nama', 'label' => '', 'rules' => 'trim|required'),
            array('field' => 'alamat', 'label' => '', 'rules' => 'trim|required')
        );

        return $validation;
    }

    public function tambah($id = null)
    {

        if ($id == null) {
            if (count($_POST)) {
                $this->form_validation->set_rules('nik', '', 'trim|required');
                $this->form_validation->set_rules('nama', '', 'trim|required');

                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $this->session->set_flashdata('errors', $errors);
                    redirect(current_url());
                } else {

                $this->MPelamar->nik = $this->input->post('nik', true);
                $this->MPelamar->nama = $this->input->post('nama', true);
                $this->MPelamar->alamat = $this->input->post('alamat', true);
                $this->MPelamar->notelp = $this->input->post('notelp', true);

                    
                    if ($this->MPelamar->insert() == true) {
                        $kdPelamar = $this->MPelamar->getLastID()->kdPelamar;
                        $success = true;
                        if($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil menambah data :)');
                            redirect('pelamar');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
                //-----
            }else{
                $data['dataView'] = $this->getDataInsert();
                loadPage('pelamar/tambah', $data);
            }
        }else{
            if(count($_POST)){
                $kdPelamar = $this->uri->segment(3, 0);
                dump($kdPelamar);
                if($kdPelamar > 0){
                     $nik = $this->input->post('nik');
                    $nama = $this->input->post('nama');
                    $alamat = $this->input->post('alamat');
                    $notelp = $this->input->post('notelp');
                    $where = array('kdPelamar' => $kdPelamar);
                    dump($pelamar);
                    if($this->MPelamar->update($where) == true){
                        $success = true;
                        
                        if ($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil mengubah data :)');
                            redirect('pelamar');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
            }
            $data['dataView'] = $this->getDataInsert();
            loadPage('pelamar/tambah', $data);
        }

    }

    public function updatePelamar()
    {
        if(count($_POST)){
            $this->form_validation->set_rules($this->getValidationUpdatePelamar());
            if ($this->form_validation->run() == false) {
                $errors = $this->form_validation->error_array();
                $errors['valid'] = false;
                echo json_encode($errors);
            }else{
                $this->MPelamar->nik = $this->input->post('nik', true);
                $this->MPelamar->nama = $this->input->post('nama', true);
                $this->MPelamar->alamat = $this->input->post('alamat', true);
                $this->MPelamar->notelp = $this->input->post('notelp', true);
                $where = array('kdPelamar' => $this->input->post('kdPelamar'));
                $update = $this->MPelamar->update($where);
                if($update){
                    $this->session->set_flashdata('message','Berhasil mengubah data :)');
                    echo json_encode(array("status" => TRUE));
                }else{
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

     public function getById($kode)
    {
        $this->MPelamar->kdPelamar = $kode;
        $data = $this->MPelamar->getById();
        echo json_encode($data);
    }

    private function getDataInsert()
    {
        $dataView = array();
        $kriteria = $this->MPelamar->getAll();
        
        

        return $dataView;
    }

    public function delete($id)
    {
        
            if($this->MPelamar->delete($id) == true){
                $this->session->set_flashdata('message','Berhasil menghapus data :)');
                echo json_encode(array("status" => 'true'));
        
        }
    }
}