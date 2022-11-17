<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subkriteria extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Sub Kriteria');
        $this->load->model('MKriteria');
        $this->load->model('MSubKriteria');
        $this->page->setLoadJs('assets/js/kriteria');
    }


   

    private function getValidationUpdateSubKriteria()
    {
        $validation = array(
            array('field' => 'kdKriteria', 'label' => '', 'rules' => 'required|integer'),
            array('field' => 'itemKriteria1', 'label' => '', 'rules' => 'trim|required'),
            array('field' => 'itemKriteria2', 'label' => '', 'rules' => 'trim|required'),
            array('field' => 'itemKriteria3', 'label' => '', 'rules' => 'trim|required'),
            array('field' => 'itemKriteria4', 'label' => '', 'rules' => 'trim|required'),
            array('field' => 'itemKriteria5', 'label' => '', 'rules' => 'trim|required')
        );

        return $validation;
    }

    public function index()
    {
        $data['kriteria'] = $this->MKriteria->getAll();
         loadPage('subkriteria/index',$data);
    }

    

    public function updateSubKriteria()
    {
        if(count($_POST)){
            $this->form_validation->set_rules($this->getValidationUpdateSubKriteria());
            if ($this->form_validation->run() == false) {
                $errors = $this->form_validation->error_array();
                $errors['valid'] = false;
                echo json_encode($errors);
            }else{
                $kdKriteria = $this->input->post('kdKriteria',true);
                $subKriteria = array();
                $status = false;

                for($i = 1; $i<= 5; $i++){

                    $subKriteria[$i] =   array( 'kdSubKriteria' => $this->input->post('kdSubKriteria'. $i, true),
                                                'subKriteria' => $this->input->post('itemKriteria'. $i, true),
                                                'value' => $i);
                }


                foreach ($subKriteria as $item) {

                    $this->MSubKriteria->kdKriteria = $kdKriteria;
                    $this->MSubKriteria->kdSubKriteria = $item['kdSubKriteria'];
                    $this->MSubKriteria->subKriteria = $item['subKriteria'];
                    $this->MSubKriteria->value = $item['value'];
                    $update = $this->MSubKriteria->update();
                    if($update){
                        $status = true;
                    }

                }
                if($status == true){
                    $this->session->set_flashdata('message','Berhasil mengubah data :)');
                }
                echo json_encode(array("status" => $status));
            }
        }
    }

   

    public function getById($kode)
    {
        $this->MKriteria->kdKriteria = $kode;
        $data = $this->MKriteria->getById();
        echo json_encode($data);
    }

    public function getSubById($kode)
    {
        $this->MSubKriteria->kdKriteria = $kode;
        $data = $this->MSubKriteria->getById();
        echo json_encode(array('param' => $data, 'kode' => $kode));
    }

    public function detail($kode)
    {
        $this->MKriteria->kdKriteria = $kode;
        $data['kriteria'] = $this->MKriteria->getById();
        $this->MSubKriteria->kdKriteria = $kode;
        $data['subkriteria']= $this->MSubKriteria->getById();

        echo json_encode($data);

    }
}