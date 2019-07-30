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

            }elseif($this->session->userdata('sesi')=="private"){
                redirect(base_url('auth/siswa_baru'));
            }
        }
    }
	//functions
	public function siswa(){
        $data['judul']="Menu Utama";
        $data['sub_judul']="Dashboard";
        $this->load->view('auth/login',$data);
    }
    
    public function test(){
        echo $this->agent->platform().' - '.$this->agent->browser().' '.$this->agent->version();
        $this->session->unset_userdata('sesi');
    }

    public function login(){
        if($this->input->post()){
            $where = array(
                'username'  => $this->input->post('username'),
                'password'  => md5($this->input->post('password'))
            );
            if($this->auth->ceking($where)){ //ceking pass & username
                if($this->auth->set_update($where)==true){ // update
                    // echo "up bener";
                    $siswa=$this->auth->akun_sesi($where);
                    if($siswa==false){
                        $this->session->set_userdata('sesi','private');
                        redirect(base_url('auth/siswa_baru'));
                    }else{
                        // set sesi
                        if( $siswa['nama']!=null&&$siswa['email']!=null&&$siswa['gender']!=null&&$siswa['agama']!=null&&$siswa['golongan_darah']!=null&&$siswa['no_hp']!=null&&$siswa['kode_alamat']!=null&&$siswa['tmp_lahir']!=null ){
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
}
