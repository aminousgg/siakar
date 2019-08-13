<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url('admin/auth'));
        }
        $this->load->model('Admin','admin');
    }

    public function index(){
        $data['judul']="Siswa";
        $data['sub_judul']="Daftar Siswa nilai siswa";
        $data['file']="nilai";
        $this->load->view('admin/utama',$data);
    }
    public function view_daftarnilai(){
        $response = $this->admin->daftarnilai()->result_array();
        // var_dump ($response);
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $row['kelas']." ".$row['kode_kelas'];
            $tbody[]    = $row['nama_siswa'];
            $tbody[]    = $row['nisn'];
            $tbody[]    = $row['nama_guru'];
            $tbody[]    = $row['nama_mapel'];
            $tbody[]    = $row['nilai_tugas'];
            $tbody[]    = $row['nilai_uts'];
            $tbody[]    = $row['nilai_uas'];
            $tbody[]    = "soon";
            $data[]     = $tbody;
        }
        if($response)
        {
            echo json_encode([
                'data'      => $data,
            ]);
        }
        else
        {
            echo json_encode([
                'data'      => 0,
            ]);
        }
    }
}
