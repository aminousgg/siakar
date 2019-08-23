<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('sesi')){
            redirect(base_url('login_siswa'));
        }
        if($this->session->userdata('sesi')['level']!='siswa'){
            redirect(base_url('login_siswa'));
        }
        if($this->session->userdata('sesi')=='private'){
            redirect(base_url('auth/siswa_baru'));
        }
    }
	//functions
	public function index(){
        $data['judul']="Menu Utama";
        $data['sub_judul']="Dashboard";
        $data['file']="dashboard";
        $this->load->view('siswa/utama',$data);
    }
    
    public function test(){
        echo $this->agent->platform().' - '.$this->agent->browser().' '.$this->agent->version();
        $this->session->unset_userdata('sesi');
    }

    public function logout(){
        $this->session->unset_userdata('sesi');
        redirect(base_url('siswa'));
    }

}
