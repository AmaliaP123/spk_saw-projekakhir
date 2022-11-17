<?php

class Admin extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('SPK Perekrutan Karyawan Baru Bagian Produksi');
        
    }

    function index() {
        if($this->session->userdata('username')!=''){
            redirect('welcome');
            //loadPage('layouts/home');
        } else {
        $this->load->view('layouts/login_form');
    }
    }

    function validasi() {
        $validation = array(
            array('field' => 'username', 'label' => '', 'rules' => 'trim|required'),
            array('field' => 'password', 'label' => '', 'rules' => 'trim|required')
        );

        $r = $this->db->where([
                'user_username' => $this->input->post('username'),
                'user_password' => md5($this->input->post('password'))
            ])->get('tbl_pengguna')->row_array();
        if(count($r)<=0){
            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
            redirect('admin');
        }else{
            $this->session->set_userdata('username',$r['user_username']);
            $this->session->set_userdata('level',$r['user_level']);
            $this->session->set_userdata('nama',$r['user_nama']);
            redirect('admin/index');
        }
    
    }
    function beranda(){
        $this->page->setTitle('SPK PEREKRUTAN KARYAWAN BARU BAGIAN PRODUKSI');
        loadPage('layouts/home');
    }
    function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('nama');
        redirect('admin');
    }
}
