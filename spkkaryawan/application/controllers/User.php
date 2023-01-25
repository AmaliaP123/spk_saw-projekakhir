<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->model('MPelamar');
        $this->load->model('MSeleksi');
        $this->load->model('MKriteria');
        $this->load->model('MSubKriteria');
        $this->load->model('MNilai');
    }

    public function index()
    {
        $data['judul'] = 'Profil Saya';
        $data['namauser'] = 'Admin SPK';

        $data['user'] = $this->user->getEmail();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function ubahPassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['namauser'] = 'Admin SPK';

        $data['user'] = $this->user->getEmail();

        $this->form_validation->set_rules(
            'password_lama',
            'password lama',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'password1_baru',
            'Password baru',
            'required|trim|min_length[3]|matches[password2_baru]'
        );
        $this->form_validation->set_rules(
            'password2_baru',
            'Konfirmasi password baru',
            'required|trim|min_length[3]|matches[password1_baru]'
        );

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubahPassword', $data);
            $this->load->view('templates/footer');
        } else {
            //cek password lama sama tidak dengan db
            $password_lama = $this->input->post('password_lama');
            $password1_baru = $this->input->post('password1_baru');
            if (!password_verify($password_lama, $data['user']['password'])) {

                $this->session->set_flashdata('message', '<div align="center" class="alert alert-danger" role="alert">
                                            Password lama tidak cocok!
                                            </div>');
                redirect('user/ubahPassword');
            } else {
                //cek password lama sama tidak dengan password baru
                if ($password_lama == $password1_baru) {
                    $this->session->set_flashdata('message', '<div align="center" class="alert alert-danger" role="alert">
                                            Password tidak boleh sama dengan password lama!
                                            </div>');
                    redirect('user/ubahPassword');
                } else {
                    //password OK
                    $this->user->ubahPassword();
                    $this->session->set_flashdata('message', '<div align="center" class="alert alert-success" role="alert">
                                            Password berhasil diubah!
                                            </div>');
                    redirect('user/ubahPassword');
                }
            }
        }
    }


    public function daftar()
    {
        if(count($_POST)){
               $this->MPelamar->nik = $this->input->post('nik', true);
                $this->MPelamar->nama = $this->input->post('nama', true);
                $this->MPelamar->alamat = $this->input->post('alamat', true);
                $this->MPelamar->notelp = $this->input->post('notelp', true);
                $this->MPelamar->posisi = $this->input->post('posisi', true);
                $this->MPelamar->periode = date('Y-m-d');

                    
                    if ($this->MPelamar->insert() == true) {
                        $kdPelamar = $this->MPelamar->getLastID()->kdPelamar;
                        $success = true;
                        if($success == true) {
                            $this->session->set_flashdata('message', 'Berhasil mengirim data pendaftaran :)');
                            redirect('user/daftar');
                        } else {
                            echo 'gagal';
                        }
                    }
            }
            $data['dataView'] = $this->getDataInsert();
            $data['judul'] = "Pendaftaran Pelamar";
            //$data['nilaiPelamar'] = $this->MNilai->getPelamar($id);
            //$data['nilaiSeleksi'] = $this->MNilai->getNilaiByPelamar($id);
            $this->load->view('user/daftar', $data);
        
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

    public function frontend()
    {
        $data['judul'] = 'SPK Penerimaan Karyawan Baru';
        $this->load->view('user/frontend', $data);
    }

    
}
