<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url('admin/auth'));
        }
        $this->load->model('Admin','admin');
    }
	public function index(){
        $data['judul']="Guru";
        $data['sub_judul']="Daftar guru";
        $data['file']="guru";
        $this->load->view('admin/utama',$data);
    }
    public function get_guru(){
        $response = $this->admin->daftarguru()->result_array();
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $i;
            $tbody[]    = $row['nip'];
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
