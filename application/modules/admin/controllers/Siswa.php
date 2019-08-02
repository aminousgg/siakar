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
