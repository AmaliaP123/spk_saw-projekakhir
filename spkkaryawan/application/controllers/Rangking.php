<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 11/05/2017
 * Time: 15:43
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rangking extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MKriteria');
        $this->load->model('MNilai');
        $this->load->model('MPelamar');
        $this->load->model('MSAW');
        $this->page->setTitle('Hasil Penilaian Seleksi');
    }

    public function posisi()
    {
        $nilai = $this->MNilai->getNilaiPelamar();
        $date = $this->uri->segment(4);
        $where = array(
            'MONTH(periode)' => explode('-', $date)[1],
            'YEAR(periode)' => explode('-', $date)[0],
            'posisi' => $this->uri->segment(3)
        );
        $pelamar = $this->MPelamar->getAll($where);

        if ($nilai == null) {
            redirect('rangking/noData');
        }
        /**
         * Menghapus table SAW jika ada
         */
        $this->MSAW->dropTable();

        /**
         * $kriteria data dari table kriteria
         */
        $kriteria = $this->MKriteria->getAll();

        /**
         * membuat table SAW berdasarkan data dari table kriteria
         * menginputkan semua data nilai
         */
        $this->MSAW->createTable($kriteria);

        /**
         * Ambil data dari table SAW untuk perhitungan awal
         */
        $table1 = $this->initialTableSAW($pelamar);
        $this->page->setData('table1', $table1);


        /**
         * mengambil sifat kriteria
         * @var $dataSifat array
         */
        $dataSifat = $this->getDataSifat();
        $this->page->setData('dataSifat', $dataSifat);

        /**
         * Mengambil nilai maksimal dan minimal berdasarkan sifat
         */
        $dataValueMinMax = $this->getVlueMinMax($dataSifat);
        $this->page->setData('valueMinMax', $dataValueMinMax);

        /**
         * Proses 1 ubah data berdasarkan sifat
         */

        $table2 = $this->getCountBySifat($dataSifat, $dataValueMinMax);
        $this->page->setData('table2', $table2);

        /**
         * Hitung perkalian bobot dengan nilai kriteria
         */
        $bobot = $this->MKriteria->getBobotKriteria();
        $this->page->setData('bobot', $bobot);
        $table3 = $this->getCountByBobot($bobot);
        $this->page->setData('table3', $table3);

        /**
         * Add kolom total dan rangking
         */
        $this->MSAW->addColumnTotalRangking();

        /**
         * Menghitung nilai total
         */
        $this->countTotal();

        /**
         * Mengambil data yang sudah di rangking
         */
        $tableFinal = $this->getDataRangking();
        $this->page->setData('tableFinal', $tableFinal);

        /**
         * Menghapus table SAW
         */
        $this->MSAW->dropTable();

        //loadPage('saw/printhasil');
        $this->load->view('saw/posisi');
    }

    public function index()
    {
        $nilai = $this->MNilai->getNilaiPelamar();
        $pelamar = $this->MPelamar->getAll();

        if ($nilai == null) {
            redirect('rangking/noData');
        }
        /**
         * Menghapus table SAW jika ada
         */
        $this->MSAW->dropTable();

        /**
         * $kriteria data dari table kriteria
         */
        $kriteria = $this->MKriteria->getAll();

        /**
         * membuat table SAW berdasarkan data dari table kriteria
         * menginputkan semua data nilai
         */
        $this->MSAW->createTable($kriteria);

        /**
         * Ambil data dari table SAW untuk perhitungan awal
         */
        $table1 = $this->initialTableSAW($pelamar);
        $this->page->setData('table1', $table1);


        /**
         * mengambil sifat kriteria
         * @var $dataSifat array
         */
        $dataSifat = $this->getDataSifat();
        $this->page->setData('dataSifat', $dataSifat);

        /**
         * Mengambil nilai maksimal dan minimal berdasarkan sifat
         */
        $dataValueMinMax = $this->getVlueMinMax($dataSifat);
        $this->page->setData('valueMinMax', $dataValueMinMax);

        /**
         * Proses 1 ubah data berdasarkan sifat
         */

        $table2 = $this->getCountBySifat($dataSifat, $dataValueMinMax);
        $this->page->setData('table2', $table2);

        /**
         * Hitung perkalian bobot dengan nilai kriteria
         */
        $bobot = $this->MKriteria->getBobotKriteria();
        $this->page->setData('bobot', $bobot);
        $table3 = $this->getCountByBobot($bobot);
        $this->page->setData('table3', $table3);

        /**
         * Add kolom total dan rangking
         */
        $this->MSAW->addColumnTotalRangking();

        /**
         * Menghitung nilai total
         */
        $this->countTotal();

        /**
         * Mengambil data yang sudah di rangking
         */
        $tableFinal = $this->getDataRangking();
        $this->page->setData('tableFinal', $tableFinal);

        /**
         * Menghapus table SAW
         */
        $this->MSAW->dropTable();
        $data['judul'] = "Seleksi Penerimaan Karyawan";
        $this->load->view('saw/index', $data);
    }


    public function pilih($date = null)
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
        loadPage('saw/pilih', $data);
    }

    public function cetak()
    {
        $nilai = $this->MNilai->getNilaiPelamar();
        $date = $this->uri->segment(4);
        $where = array(
            'MONTH(periode)' => explode('-', $date)[1],
            'YEAR(periode)' => explode('-', $date)[0],
            'posisi' => $this->uri->segment(3)
        );
        $pelamar = $this->MPelamar->getAll($where);

        if ($nilai == null) {
            redirect('rangking/noData');
        }
        /**
         * Menghapus table SAW jika ada
         */
        $this->MSAW->dropTable();

        /**
         * $kriteria data dari table kriteria
         */
        $kriteria = $this->MKriteria->getAll();

        /**
         * membuat table SAW berdasarkan data dari table kriteria
         * menginputkan semua data nilai
         */
        $this->MSAW->createTable($kriteria);

        /**
         * Ambil data dari table SAW untuk perhitungan awal
         */
        $table1 = $this->initialTableSAW($pelamar);
        $this->page->setData('table1', $table1);


        /**
         * mengambil sifat kriteria
         * @var $dataSifat array
         */
        $dataSifat = $this->getDataSifat();
        $this->page->setData('dataSifat', $dataSifat);

        /**
         * Mengambil nilai maksimal dan minimal berdasarkan sifat
         */
        $dataValueMinMax = $this->getVlueMinMax($dataSifat);
        $this->page->setData('valueMinMax', $dataValueMinMax);

        /**
         * Proses 1 ubah data berdasarkan sifat
         */

        $table2 = $this->getCountBySifat($dataSifat, $dataValueMinMax);
        $this->page->setData('table2', $table2);

        /**
         * Hitung perkalian bobot dengan nilai kriteria
         */
        $bobot = $this->MKriteria->getBobotKriteria();
        $this->page->setData('bobot', $bobot);
        $table3 = $this->getCountByBobot($bobot);
        $this->page->setData('table3', $table3);

        /**
         * Add kolom total dan rangking
         */
        $this->MSAW->addColumnTotalRangking();

        /**
         * Menghitung nilai total
         */
        $this->countTotal();

        /**
         * Mengambil data yang sudah di rangking
         */
        $tableFinal = $this->getDataRangking();
        $this->page->setData('tableFinal', $tableFinal);

        /**
         * Menghapus table SAW
         */
        $this->MSAW->dropTable();

        //loadPage('saw/printhasil');
        $this->load->view('saw/printhasil');
    }
    public function detail()
    {
        $nilai = $this->MNilai->getNilaiPelamar();
        $date = $this->uri->segment(4);
        $where = array(
            'MONTH(periode)' => explode('-', $date)[1],
            'YEAR(periode)' => explode('-', $date)[0],
            'posisi' => $this->uri->segment(3)
        );
        $pelamar = $this->MPelamar->getAll($where);

        if ($nilai == null) {
            redirect('rangking/noData');
        }
        /**
         * Menghapus table SAW jika ada
         */
        $this->MSAW->dropTable();

        /**
         * $kriteria data dari table kriteria
         */
        $kriteria = $this->MKriteria->getAll();

        /**
         * membuat table SAW berdasarkan data dari table kriteria
         * menginputkan semua data nilai
         */
        $this->MSAW->createTable($kriteria);

        /**
         * Ambil data dari table SAW untuk perhitungan awal
         */
        $table1 = $this->initialTableSAW($pelamar);
        $this->page->setData('table1', $table1);


        /**
         * mengambil sifat kriteria
         * @var $dataSifat array
         */
        $dataSifat = $this->getDataSifat();
        $this->page->setData('dataSifat', $dataSifat);

        /**
         * Mengambil nilai maksimal dan minimal berdasarkan sifat
         */
        $dataValueMinMax = $this->getVlueMinMax($dataSifat);
        $this->page->setData('valueMinMax', $dataValueMinMax);

        /**
         * Proses 1 ubah data berdasarkan sifat
         */

        $table2 = $this->getCountBySifat($dataSifat, $dataValueMinMax);
        $this->page->setData('table2', $table2);

        /**
         * Hitung perkalian bobot dengan nilai kriteria
         */
        $bobot = $this->MKriteria->getBobotKriteria();
        $this->page->setData('bobot', $bobot);
        $table3 = $this->getCountByBobot($bobot);
        $this->page->setData('table3', $table3);

        /**
         * Add kolom total dan rangking
         */
        $this->MSAW->addColumnTotalRangking();

        /**
         * Menghitung nilai total
         */
        $this->countTotal();

        /**
         * Mengambil data yang sudah di rangking
         */
        $tableFinal = $this->getDataRangking();
        $this->page->setData('tableFinal', $tableFinal);

        /**
         * Menghapus table SAW
         */
        $this->MSAW->dropTable();

        loadPage('saw/detail');
       // $this->load->view('saw/detail');
    }
    public function noData()
    {
        loadPage('saw/noData');
    }
    private function initialTableSAW($pelamar)
    {
        $nilai = $this->MNilai->getNilaiPelamar();

        $dataInput = array();
        $no = 0;
        foreach ($pelamar as $item => $itemPelamar) {
            foreach ($nilai as $index => $itemNilai) {
                if ($itemPelamar->kdPelamar == $itemNilai->kdPelamar) {
                    $dataInput[$no]['nama'] = $itemPelamar->nama;
                    $dataInput[$no][$itemNilai->kriteria] = $itemNilai->nilai;
                }
            }
            $no++;
        }

        foreach ($dataInput as $data => $item) {
            $this->MSAW->insert($item);
        }
        // echo "<pre>";
        // print_r($pelamar);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($dataInput);
        // echo "</pre>";

        // die();
        return $this->MSAW->getAll();
    }

    private function getDataSifat()
    {
        $sawData = $this->MSAW->getAll();
        $dataSifat = array();



        foreach ($sawData as $item => $value) {
            foreach ($value as $x => $z) {
                if ($x == 'nama') {
                    continue;
                }
                $dataSifat[$x] = $this->MSAW->getStatus($x);
            }
        }
        return $dataSifat;
    }



    private function getVlueMinMax($dataSifat)
    {
        $sawData = $this->MSAW->getAll();
        $dataValueMinMax = array();
        foreach ($sawData as $point => $value) {
            foreach ($value as $x => $z) {
                if ($x == 'nama') {
                    continue;
                }
                foreach ($dataSifat as $item => $itemX) {
                    if ($x == $item) {

                        if ($x == $item && $itemX->sifat == 'B') {
                            if (!isset($dataValueMinMax['max' . $x])) {
                                $dataValueMinMax['kriteria' . $x] = $x;
                                $dataValueMinMax['max' . $x] = $z;
                                $dataValueMinMax['sifat' . $x] = 'Benefit';
                            } elseif ($z > $dataValueMinMax['max' . $x]) {
                                $dataValueMinMax['max' . $x] = $z;
                            }
                        } else {
                            if (!isset($dataValueMinMax['min' . $x])) {
                                $dataValueMinMax['kriteria' . $x] = $x;
                                $dataValueMinMax['min' . $x] = $z;
                                $dataValueMinMax['sifat' . $x] = 'Cost';
                            } elseif ($z < $dataValueMinMax['min' . $x]) {
                                $dataValueMinMax['min' . $x] = $z;
                            }
                        }
                    }
                }
            }
        }

        return $dataValueMinMax;
    }

    private function getCountBySifat($dataSifat, $dataValueMinMax)
    {
        $sawData = $this->MSAW->getAll();
        foreach ($sawData as $point => $value) {
            foreach ($value as $x => $z) {
                if ($x == 'Universitas') {
                    continue;
                }
                foreach ($dataSifat as $item => $sifat) {
                    if ($x == $item) {
                        if ($sifat->sifat == 'B') {

                            $newData = $z / $dataValueMinMax['max' . $x];
                            $dataUpdate = array(
                                $x => $newData
                            );
                            $where = array(

                                'nama' => $value->nama
                            );

                            $this->MSAW->update($dataUpdate, $where);
                        } else {
                            $newData = $dataValueMinMax['min' . $x] / $z;
                            $dataUpdate = array(
                                $x => $newData
                            );
                            $where = array(

                                'nama' => $value->nama
                            );

                            $this->MSAW->update($dataUpdate, $where);
                        }
                    }
                }
            }
        }

        return $this->MSAW->getAll();
    }

    private function countTotal()
    {
        $sawData = $this->MSAW->getAll();

        foreach ($sawData as $item => $value) {
            $total = 0;
            foreach ($value as $item => $itemData) {
                if ($item == 'nama') {
                    continue;
                } elseif ($item == 'Total') {
                    $dataUpdate = array(
                        'Total' => $total
                    );

                    $where = array(
                        'nama' => $value->nama
                    );

                    $this->MSAW->update($dataUpdate, $where);
                } else {
                    $total = $total + $itemData;
                }
            }
        }
    }

    private function getCountByBobot($bobot)
    {

        $sawData = $this->MSAW->getAll();
        foreach ($sawData as $point => $value) {
            foreach ($value as $x => $z) {
                if ($x == 'nama') {
                    continue;
                }
                foreach ($bobot as $item => $itemKriteria) {

                    if ($x == $itemKriteria->kriteria) {

                        $sawData[$point]->$x =  $z * $itemKriteria->bobot;
                        $newData = $z * $itemKriteria->bobot;
                        $dataUpdate = array(
                            $x => $newData
                        );
                        $where = array(
                            'nama' => $value->nama
                        );

                        $this->MSAW->update($dataUpdate, $where);
                    }
                }
            }
        }

        return $this->MSAW->getAll();
    }

    private function getDataRangking()
    {
        $sawData = $this->MSAW->getSortTotalByDesc();
        $no = 1;
        foreach ($sawData as $item => $value) {
            $dataUpdate = array(
                'Rangking' => $no
            );
            $where = array(
                'nama' => $value->nama
            );

            $this->MSAW->update($dataUpdate, $where);
            $no++;
        }
        return $this->MSAW->getAll();
    }
}
