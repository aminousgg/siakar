<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('sesi')){
            redirect(base_url('login_guru'));
        }
        if($this->session->userdata('sesi')['level']!='guru'){
            redirect(base_url('login_guru'));
        }
        if($this->session->userdata('sesi')=='private'){
            redirect(base_url('auth/siswa_baru'));
        }
        if($this->session->userdata('sesi')=='private_guru'){
            redirect(base_url('auth/guru_baru'));
        }
    }
	//functions
	public function index(){
        $data['judul']="Menu Utama";
        $data['sub_judul']="Dashboard";
        $this->load->view('guru/utama',$data);
    }
    
    public function test(){
        echo $this->agent->platform().' - '.$this->agent->browser().' '.$this->agent->version();
        $this->session->unset_userdata('sesi');
    }

    public function logout(){
        $this->session->unset_userdata('sesi');
        redirect(base_url('guru'));
    }

}
