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
}
