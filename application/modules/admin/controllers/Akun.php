<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url('admin/auth'));
        }
        $this->load->model('Admin','admin');
    }
	//functions
	public function index(){
        $data['judul']="Akun";
        $data['sub_judul']="Managemen Akun";
        $data['file']="akun";
        $this->load->view('admin/utama',$data);
    }
    public function get_akun($who){
        $response = $this->admin->akun($who)->result_array();
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $i;
            $tbody[]    = $row['username'];
            $tbody[]    = $row['device'];
            $tbody[]    = $row['last_login'];
            $aksi = '<button class="btn btn-info btn-xs" type="button"><i class="fa fa-paste"></i> </button>';
            $aksi .= '<button class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash-o"></i> <span class="bold"> </span></button>';
            $tbody[]    = $aksi;
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
    public function tambah(){
        if($this->input->post('level')=="siswa"){
            $where = array(
                'username' => $this->input->post('nisn'),
                'level'    => $this->input->post('level')
            );
            $cek=$this->db->get_where('akun',$where)->num_rows();
            if($cek>0){
                $this->session->set_flashdata('alert_gagal','Siswa sudah terdaftar');
                redirect(base_url('admin/akun'));
            }else{
                $data = array(
                    'username' => $this->input->post('nisn'),
                    'password' => md5($this->input->post('nisn')),
                    'level'    => $this->input->post('level')
                );
                if($this->admin->tambahakun($data)){
                    $this->session->set_flashdata('alert_success','Berhasil Menambah akun');
                    redirect(base_url('admin/akun'));
                }
            }
        }
        if($this->input->post('level')=="guru"){
            $where = array(
                'username' => $this->input->post('nip'),
                'level'    => $this->input->post('level')
            );
            $cek=$this->db->get_where('akun',$where)->num_rows();
            if($cek>0){
                $this->session->set_flashdata('alert_gagal','Guru sudah terdaftar');
                redirect(base_url('admin/akun'));
            }else{
                $data = array(
                    'username' => $this->input->post('nip'),
                    'password' => md5($this->input->post('nip')),
                    'level'    => $this->input->post('level')
                );
                if($this->admin->tambahakun($data)){
                    $this->session->set_flashdata('alert_success','Berhasil Menambah akun');
                    redirect(base_url('admin/akun'));
                }
            }
        }
    }
}
