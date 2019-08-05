<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perwalian extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url('admin/auth'));
        }
        $this->load->model('Admin','admin');
    }
	public function index(){
        $data['judul']="Perwalian";
        $data['sub_judul']="Wali Kelas";
        $data['file']="perwalian";
        $this->load->view('admin/utama',$data);
    }
    public function get_walikelas(){
        $response = $this->admin->walikelas()->result_array();
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $i;
            $tbody[]    = $row['kelas'].'-'.$row['kode_kelas'];
            $tbody[]    = $row['nama'];
            $tbody[]    = $row['tahun_ajaran'];
            $aksi = '<button class="btn btn-info" type="button"><i class="fa fa-paste"></i> Edit</button>';
            $aksi .= '<button class="btn btn-danger" type="button"><i class="fa fa-trash-o"></i> <span class="bold">Hapus</span></button>';
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
    public function ajax_kelas(){
        echo json_encode($this->admin->kelas()->result());
    }
    public function ajax_guru(){
        echo json_encode($this->admin->daftarguru()->result());
    }
    public function tambah_wali(){
        $where = array(
            'id_kelas'  => $this->input->post('id_kelas'),
        );
        if($this->db->get_where('walikelas',$where)->num_rows()>0){
            $this->session->set_flashdata('alert_gagal','gagal menambah walikelas, kelas sudah terdaftar');
            redirect(base_url('admin/perwalian'));
        }else{
            $data = array(
                'kode_wali' => (string)rand(1000,9999),
                'id_kelas'  => $this->input->post('id_kelas'),
                'nip_guru'  => $this->input->post('nip'),
                'tahun_ajaran' => $this->input->post('tahun_ajaran')
            );
            if($this->db->insert('walikelas',$data)){
                $this->session->set_flashdata('alert_success','Berhasil menambah walikelas');
                redirect(base_url('admin/perwalian'));
            }else{
                $this->session->set_flashdata('alert_gagal','gagal menambah walikelas');
                redirect(base_url('admin/perwalian'));
            }
        }
    }

}
