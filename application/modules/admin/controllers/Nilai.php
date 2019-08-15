<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url('admin/auth'));
        }
        $this->load->model('Admin','admin');
    }

    public function index(){
        $data['judul']="Nilai siswa";
        $data['sub_judul']="Daftar Siswa nilai siswa";
        $data['file']="nilai";
        $this->load->view('admin/utama',$data);
    }
    public function view_daftarnilai(){
        $response = $this->admin->daftarnilai()->result_array();
        // var_dump ($response);
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $row['kelas']." ".$row['kode_kelas'];
            $tbody[]    = $row['nama_siswa'];
            $tbody[]    = $row['nisn'];
            $tbody[]    = $row['nama_guru'];
            $tbody[]    = $row['nama_mapel'];
            $tbody[]    = $row['nilai_tugas'];
            $tbody[]    = $row['nilai_uts'];
            $tbody[]    = $row['nilai_uas'];
            $tbody[]    = "<a href='#' data-id='".$row['id']."' class='btn btn-info edit' data-toggle='modal' data-target='#myModal8'><i class='fa fa-paste'></i> Edit Nilai</a>";
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
    public function edit($id=null){
        $data['judul']="Edit Nilai";
        $data['sub_judul']="Edit Nilai siswa";
        $data['file']="edit_nilai";
        $this->load->view('admin/utama',$data);
    }
    public function daftar(){
        $this->db->select('id');
        $response = $this->admin->daftarnilai()->result_array();
        echo json_encode($response);
    }
    public function getbyid(){
        $id = $this->input->get('id');
        $response = $this->admin->daftarnilai($id)->row_array();
        echo json_encode($response);
    }
    public function ubah_nilai(){
        $id = $this->input->post('id');
        $up = array(
            'nilai_tugas'=>$this->input->post('tgs'),
            'nilai_uts'=>$this->input->post('uts'),
            'nilai_uas'=>$this->input->post('uas')
        );
        $this->db->where('id',$id);
        if($this->db->update('nilai',$up)){
            $this->session->set_flashdata('alert_success', 'berhasil merubah nilai');
            redirect(base_url('admin/nilai'));
        }else{
            $this->session->set_flashdata('alert_gagal', 'Gagal merubah nilai');
            redirect(base_url('admin/nilai'));
        }
    }
}
