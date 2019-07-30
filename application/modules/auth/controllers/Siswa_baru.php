<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_baru extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Auth','auth');
        if($this->session->userdata('sesi')!='private'){
            redirect(base_url('auth/main/siswa'));
        }
        if(!$this->session->userdata('sesi')){
            redirect(base_url('auth/main/siswa'));
        }
    }
	//functions
	public function index(){
        $data['judul']="Biodata Siswa";
        $data['sub_judul']="Registrasi ".APP_NAME;
        $this->load->view('auth/siswa-baru',$data);
    }
    public function test(){
        echo $this->agent->platform().' - '.$this->agent->browser().' '.$this->agent->version();
        $this->session->unset_userdata('sesi');
    }
}
