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
    public function get_kota(){
        echo json_encode($this->auth->kota());
    }
    public function get_prov(){
        echo json_encode($this->auth->provinsi());
    }
    public function kotaFromprov(){
        $id = $this->input->get('id');
        $where = array(
            'province_id' => $id
        );
        echo json_encode($this->auth->kota_in($where));
    }
    public function kecFromkota(){
        $id = $this->input->get('id');
        $where = array(
            'regency_id' => $id
        );
        echo json_encode($this->auth->kec_in($where));
    }
    public function submit(){
        $data = array(
            'nisn'              => $this->session->userdata('username'),
            'nama'              => $this->input->post('nama_depan')." ".$this->input->post('nama_belakang'),
            'tgl_lahir'         => $this->input->post('tgl_lahir'),
            'tmp_lahir'         => $this->input->post('tmp_lahir'),
            'gender'            => $this->input->post('gender'),
            'agama'             => $this->input->post('agama'),
            'golongan_darah'    => $this->input->post('golongan_darah'),
            'status'            => "Aktif",
            'no_hp'             => $this->input->post('no_hp'),
            'email'             => $this->input->post('email')
        );
        $alamat = array(
            'kode'      => $this->session->userdata('username'),
            'detail'    => $this->input->post('alamat'),
            'kecamatan' => $this->input->post('kec'),
            'kota_kab'  => $this->input->post('kota'),
            'provinsi'  => $this->input->post('prov')
        );
        if($this->auth->save_bio($data,$alamat)){
            $siswa = $this->auth->siswa($this->session->userdata('username'))->row_array();
            $this->session->unset_userdata('username');
            $sesi = array(
                'nisn'  => $siswa['nisn'],
                'nama'  => $siswa['nama'],
                'email' => $siswa['email'],
                'semester' => $siswa['semester'],
                'level' => "siswa"
            );
            $this->session->set_userdata('sesi',$sesi);
            echo '<script>alert("hai");</script>';
            redirect(base_url('siswa'));
        }else{
            echo '<script>alert("gagal bos");</script>';
        }
    }
}
