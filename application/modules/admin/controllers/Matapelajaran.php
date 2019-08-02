<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matapelajaran extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url('admin/auth'));
        }
        $this->load->model('Admin','admin');
    }
    public function index(){
        $data['judul']="Mapel";
        $data['sub_judul']="Mata Pelajaran";
        $data['file']="mapel";
        $this->load->view('admin/utama',$data);
    }

    public function get_pelajaran(){
        $response = $this->admin->pelajaran()->result_array();
        // $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $row['id'];
            $tbody[]    = $row['kode_pel'];
            $tbody[]    = $row['nama_mapel'];
            $data[]     = $tbody;
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
    public function tambah_pelajaran(){
        $data = array(
            'kode_pel'  => rand(1000,9999),
            'nama_mapel'=> $this->input->post('nama_mapel')
        );
        if($this->admin->in_pelajaran($data)){
            $this->session->set_flashdata('alert_success','Berhasil Menambah');
            redirect(base_url('admin/matapelajaran'));
        }else{
            echo "error";
        }
    }
    public function mapelajar(){
        $response = $this->admin->mapel_ajaran()->result_array();
        // $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $row['id'];
            $tbody[]    = $row['nama_mapel'];
            $tbody[]    = $row['nip_guru'];
            $tbody[]    = $row['nama'];
            $data[]     = $tbody;
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
    public function get_mapel(){
        echo json_encode($this->admin->mapel()->result());
    }
    public function get_guru(){
        $this->db->select('nip, nama');
        echo json_encode($this->admin->daftarguru()->result());
    }

    public function tambah_pengajar(){
        $data = array(
            'kode_mapel'=> $this->input->post('kode_pel'),
            'nip_guru'  => $this->input->post('nip_guru')
        );
        if($this->admin->cek_pengajar($data)){
            if($this->admin->in_pengajar($data)){
                $this->session->set_flashdata('alert_success','Berhasil Menambah !');
                redirect(base_url('admin/matapelajaran'));
            }else{
                echo "error";
            }
        }else{
            echo "pengajar dan mapel sudah di input";
        }
    }
}
