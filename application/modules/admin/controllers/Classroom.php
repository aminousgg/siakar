<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classroom extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url('admin/auth'));
        }
        $this->load->model('Admin','admin');
    }

    public function index(){
        $data['judul']="Kelas room";
        $data['sub_judul']="Daftar Kelas room";
        $data['file']="classroom";
        $this->load->view('admin/utama',$data);
    }


    public function get_siswa(){
        $data = $this->admin->siswa()->result();
        echo json_encode($data);
    }
    public function get_kelas(){
        $data = $this->admin->kelas()->result();
        echo json_encode($data);
    }
    public function get_walikelas(){
        $data = $this->admin->get_walikelas()->result();
        echo json_encode($data);
    }
    public function get_mapel(){
        $data = $this->admin->mapel()->result();
        echo json_encode($data);
    }
    public function get_guru(){
        $mapel=$this->input->get('mapel');
        $data = $this->admin->guru_mapel($mapel)->result();
        echo json_encode($data);
    }

    public function tambah_classroom(){
        // $where = array(
        //     'nisn'      => $this->input->post('siswa'),
        //     'id_mata_pelajaran'=> $this->input->post('id_mapel'),
        //     'id_kelas'=> $this->input->post('kode_kelas'),
        // );
        $kode_room = (string)rand(1000,9999);
        $kd_mapel = $this->input->post('kode_mapel');
        $mapel = $this->admin->data_mapel($kd_mapel)->row_array();
        $data = array(
            'kode_room' => $kode_room,
            'nisn'      => $this->input->post('siswa'),
            'id_mata_pelajaran'=> $this->input->post('id_mapel'),
            'id_kelas'=> $this->input->post('kode_kelas'),
        );
        if($this->admin->in_classroom($data)){
            $this->session->set_flashdata('alert_success', 'Berhasil insert classroom');
            redirect(base_url('admin/classroom'));
        }else{
            $this->session->set_flashdata('alert_gagal', 'gagal insert classroom');
            redirect(base_url('admin/classroom'));
        }

    }
    public function view_classroom(){
        $response = $this->admin->get_classroom()->result_array();
        // var_dump ($response);
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $i;
            // $tbody[]    = $row['kode_room'];
            $tbody[]    = $row['nama_siswa'];
            $tbody[]    = $row['nama_mapel'];
            $tbody[]    = $row['kelas']." ".$row['kode_kelas'];
            $tbody[]    = $row['nama_guru'];
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
    public function view_grupkelas(){
        $response = $this->admin->grub_kelas()->result_array();
        // var_dump ($response);
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $i;
            $tbody[]    = $row['nisn'];
            $tbody[]    = $row['nama_siswa'];
            $tbody[]    = $row['kelas']." ".$row['kode_kelas'];
            $tbody[]    = $row['nama_guru'];
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
    public function tambah_siswa_kegrup_kelas(){
        $where=array(
            'nisn' => $this->input->post('nisn'),
        );
        if( $this->db->get_where('grup_kelas',$where)->num_rows()>0 ){
            $this->session->set_flashdata('alert_gagal', 'Siswa Sudah terdaftar');
            redirect(base_url('admin/classroom'));
        }else{
            $kode_wali = $this->admin->ambil_kodewalikelas( $this->input->post('id_kelas') );
            $data=array(
                'nisn' => $this->input->post('nisn'),
                'id_kelas' => $this->input->post('id_kelas'),
                'kode_walikelas' => $kode_wali['kode_wali']
            );
            if($this->db->insert('grup_kelas',$data)){
                $this->session->set_flashdata('alert_success', 'Berhasil Menambahkan siswa ke grup kelas');
                redirect(base_url('admin/classroom'));
            }else{
                $this->session->set_flashdata('alert_gagal', 'Gagal Menambahkan siswa ke grup kelas');
                redirect(base_url('admin/classroom'));
            }
        }
    }
}
