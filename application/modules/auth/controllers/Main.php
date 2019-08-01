<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Auth','auth');
        if($this->session->userdata('sesi')){
            if($this->session->userdata('sesi')['level']=="siswa"){
                redirect(base_url('siswa'));
            }elseif($this->session->userdata('sesi')['level']=="guru"){
                redirect(base_url('guru'));
            }elseif($this->session->userdata('sesi')=="private"){
                redirect(base_url('auth/siswa_baru'));
            }elseif($this->session->userdata('sesi')=="private_guru"){
                redirect(base_url('auth/guru_baru'));
            }
        }
    }
	//functions
	public function siswa(){
        $data['judul']="Menu Utama";
        $data['sub_judul']="Dashboard";
        $this->load->view('auth/login',$data);
    }
	public function guru(){
        $data['judul']="Menu Utama";
        $data['sub_judul']="";
        $this->load->view('auth/login_guru',$data);
    }
    
    public function test(){
        echo $this->agent->platform().' - '.$this->agent->browser().' '.$this->agent->version();
        $this->session->unset_userdata('sesi');
    }

    public function login(){
        if($this->input->post() && $this->input->post('level')=='siswa'){
            $where = array(
                'username'  => $this->input->post('username'),
                'password'  => md5($this->input->post('password')),
                'level'     => $this->input->post('level')
            );
            if($this->auth->ceking($where)){ //ceking pass & username
                if($this->auth->set_update($where)==true){ // update
                    // echo "up bener";
                    $siswa=$this->auth->akun_sesi($where);
                    if($siswa==false){
                        $this->session->set_userdata('sesi','private');
                        $this->session->set_userdata('username',$this->input->post('username'));
                        redirect(base_url('auth/siswa_baru'));
                    }else{
                        // set sesi
                        if( $siswa['nama']!=null&&$siswa['email']!=null&&$siswa['gender']!=null&&$siswa['agama']!=null&&$siswa['golongan_darah']!=null&&$siswa['no_hp']!=null&&$siswa['tmp_lahir']!=null ){
                            $sesi = array(
                                'nisn'  => $siswa['nisn'],
                                'nama'  => $siswa['nama'],
                                'email' => $siswa['email'],
                                'semester' => $siswa['semester'],
                                'level' => "siswa"
                            );
                        }else{
                            echo "data belum lengkap"; die;
                        }
                        $this->session->set_userdata('sesi',$sesi);
                        // var_dump($this->session->userdata('sesi'));
                        redirect(base_url('siswa'));
                    }
                }
            }else{
                echo "salah";
            }
        }else{
            // redirect index
            echo "hai";
        }
    }

    public function login_guru(){
        if($this->input->post() && $this->input->post('level')=='guru'){
            $where = array(
                'username'  => $this->input->post('username'),
                'password'  => md5($this->input->post('password')),
                'level'     => $this->input->post('level')
            );
            if($this->auth->ceking($where)){ //ceking pass & username
                if($this->auth->set_update($where)==true){ // update
                    // echo "up bener";
                    $guru=$this->auth->akun_sesi($where);
                    if($guru==false){
                        $this->session->set_userdata('sesi','private_guru');
                        $this->session->set_userdata('username',$this->input->post('username'));
                        redirect(base_url('auth/guru_baru'));
                    }else{
                        // set sesi
                        if( $guru['nama']!=null&&$guru['email']!=null&&$guru['gender']!=null&&$guru['agama']!=null&&$guru['golongan_darah']!=null&&$guru['no_hp']!=null&&$guru['tmp_lahir']!=null ){
                            $sesi = array(
                                'nip'  => $guru['nip'],
                                'nama'  => $guru['nama'],
                                'email' => $guru['email'],
                                'no_hp' => $guru['no_hp'],
                                'level' => "guru"
                            );
                        }else{
                            echo "data belum lengkap"; die;
                        }
                        $this->session->set_userdata('sesi',$sesi);
                        // var_dump($this->session->userdata('sesi'));
                        // redirect(base_url('guru'));
                        redirect(base_url('guru'));
                    }
                }
            }else{
                echo "salah";
            }
        }else{
            // redirect index
            echo "hai";
        }
    }
    
    public function get_kota(){
       echo json_encode($this->auth->kota());
    }
}
