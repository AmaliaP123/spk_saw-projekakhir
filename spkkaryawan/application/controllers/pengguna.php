<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:42
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Data Pengguna');
        $this->load->model('MPengguna');
        $this->page->setLoadJs('assets/js/pengguna');
    }

    public function index()
    {
        $data['pengguna'] = $this->MPengguna->getAll();
        loadPage('pengguna/index',$data);
    
    }

    
private function getValidationUpdatePengguna()
    {
        $validation = array(
            array('field' => 'user_id', 'label' => '', 'rules' => 'required|integer'),
            array('field' => 'nama', 'label' => '', 'rules' => 'trim|required'),
            array('field' => 'username', 'label' => '', 'rules' => 'trim|required'),
            array('field' => 'password', 'label' => '', 'rules' => 'trim|required')
        );

        return $validation;
    }

    public function tambah($id = null)
    {

        if ($id == null) {
            if (count($_POST)) {
                $this->form_validation->set_rules('nama', '', 'trim|required');
                $this->form_validation->set_rules('username', '', 'trim|required');
                $this->form_validation->set_rules('password', '', 'trim|required');
                $this->form_validation->set_rules('level', '', 'required|integer');

                if ($this->form_validation->run() == false) {
                    $errors = $this->form_validation->error_array();
                    $this->session->set_flashdata('errors', $errors);
                    redirect(current_url());
                } else {

                $this->MPengguna->user_nama = $this->input->post('nama', true);
                $this->MPengguna->user_username = $this->input->post('username', true);
                $this->MPengguna->user_password = $this->input->post('password', true);
                $this->MPengguna->user_level = $this->input->post('level', true);

                    
                    if ($this->MPengguna->insert() == true) {
                        $user_id = $this->MPengguna->getLastID()->user_id;
                        $success = true;
                        if($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil menambah data :)');
                            redirect('pengguna');
                        } else {
                            echo 'gagal';
                        }
                    }
                }
                //-----
            }else{
                $data['dataView'] = $this->getDataInsert();
                loadPage('pengguna/tambah', $data);
            }
        }else{
            
            $data['dataView'] = $this->getDataInsert();
            loadPage('pengguna/tambah', $data);
        }

    }

    public function updatePengguna()
    {
        if(count($_POST)){
            $this->form_validation->set_rules($this->getValidationUpdatePengguna());
            if ($this->form_validation->run() == false) {
                $errors = $this->form_validation->error_array();
                $errors['valid'] = false;
                echo json_encode($errors);
            }else{
                $this->MPengguna->user_nama = $this->input->post('nama', true);
                $this->MPengguna->user_username = $this->input->post('username', true);
                $this->MPengguna->user_password = $this->input->post('password', true);
                $this->MPengguna->user_level = $this->input->post('level', true);
                $where = array('user_id' => $this->input->post('user_id'));
                $update = $this->MPengguna->update($where);
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
        $this->MPengguna->user_id = $kode;
        $data = $this->MPengguna->getById();
        echo json_encode($data);
    }

    private function getDataInsert()
    {
        $dataView = array();
        $pengguna = $this->MPengguna->getAll();
        
        

        return $dataView;
    }

    public function delete($id)
    {
        
            if($this->MPengguna->delete($id) == true){
                $this->session->set_flashdata('message','Berhasil menghapus data :)');
                echo json_encode(array("status" => 'true'));
        
        }
    }
}