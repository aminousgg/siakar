<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url('admin/auth'));
        }
        $this->load->model('Admin','admin');
    }

    public function index(){
        $data['judul']="Siswa";
        $data['sub_judul']="Daftar Siswa";
        $data['file']="siswa";
        $this->load->view('admin/utama',$data);
    }
    public function get_siswa(){
        $response = $this->admin->daftarsiswa()->result_array();
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $i;
            $tbody[]    = $row['nisn'];
            $tbody[]    = $row['nama'];
            $tbody[]    = $row['tmp_lahir'].", ".$row['tgl_lahir'];
            $tbody[]    = $row['no_hp'];
            $tbody[]    = $row['email'];
            $aksi = '<button class="btn btn-info" type="button"><i class="fa fa-paste"></i> Edit</button>';
            $aksi .= '<button class="btn btn-danger" type="button"><i class="fa fa-trash-o"></i> <span class="bold">Hapus</span></button>';
            $tbody[]    = $aksi;
            $data[]     = $tbody;
            $i++;
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
