<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url('admin/auth'));
        }
        $this->load->model('Admin','admin');
    }
	//functions
	public function index(){
        $data['judul']="Menu Utama";
        $data['sub_judul']="Dashboard";
        $data['file']="dashboard";
        $this->load->view('admin/utama',$data);
    }
    public function logout(){
        $this->session->unset_userdata('admin');
        redirect(base_url('admin'));
    }
    public function tahun_ajaran(){
        $response = $this->admin->show_tahunajaran()->result_array();
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $i;
            $tbody[]    = $row['tahun'];
            if($row['semester']=="ganjil"){
                $smt = '<span class="label label-warning">'.$row['semester'].'</span>';
            }else{
                $smt = '<span class="label label-success">'.$row['semester'].'</span>';
            }
            $tbody[]    = $smt;
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
