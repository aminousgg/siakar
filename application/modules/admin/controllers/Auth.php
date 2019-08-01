<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    function __construct() {
        parent::__construct();
        if($this->session->userdata('admin')){
            redirect(base_url('admin'));
        }
        $this->load->model('Authentication','auth');
    }
	//functions
	public function index(){
        $data['judul']="Login";
        $data['sub_judul']="";
        $this->load->view('admin/login',$data);
    }
    public function login(){
        $where = array(
            'username'  => $this->input->post('username'),
            'password'  => md5($this->input->post('password')),
            'level'     => $this->input->post('level')
        );
        if($this->auth->ceking($where)){
            $set = $this->auth->setup($where['username']);
            if($set!=false){
                $this->session->set_userdata('admin',$set);
                redirect(base_url('admin/auth'));
            }else{
                echo "Gagal setup sesi";
            }
        }else{
            echo "pass/usr salah";
        }
    }
}
