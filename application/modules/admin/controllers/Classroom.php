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
    // public function get_mapel(){
    //     $data = $this->admin->mapel()->result();
    //     echo json_encode($data);
    // }
    public function get_guru(){
        $mapel=$this->input->get('mapel');
        $data = $this->admin->guru_mapel($mapel)->result();
        echo json_encode($data);
    }
    public function terdaftarwali(){
        echo json_encode($this->admin->walikelas_get()->result());
    }
    public function guru_mapel(){
        echo json_encode($this->admin->guru_pengajar()->result());
    }
    public function tambah_classroom(){
        $where= array(
            'id_mata_pelajaran' => $this->input->post('id_mapel'),
            'kode_walikelas'    => $this->input->post('kode_wali')
        );
        if($this->db->get_where('classroom',$where)->num_rows()>0){
            $this->session->set_flashdata('alert_gagal', 'Gagal menambah kelas sudah terdaftar');
            redirect(base_url('admin/classroom'));
        }
        $kode = rand(1000,9999);
        $data = array(
            'kode_room' => $kode,
            'id_mata_pelajaran' => $this->input->post('id_mapel'),
            'kode_walikelas'    => $this->input->post('kode_wali'),
            'tahun_ajaran'      => "2019/2020"
        );
        $this->db->where('kode_walikelas', $this->input->post('kode_wali'));
        $angkutan= $this->db->get('grup_kelas')->result();
        $cek = 0;
        foreach ($angkutan as $row){
            $in = array(
                'id_grup_kelas' => $row->id,
                'nisn'  => $row->nisn,
                'id_mata_pelajaran' => $this->input->post('id_mapel')
            );
            if($this->db->insert('nilai',$in)){
                $cek++;
            }
        }
        if($this->db->insert('classroom',$data) && $cek==sizeof($angkutan)){
            $this->session->set_flashdata('alert_success', 'berhasil menambah');
            redirect(base_url('admin/classroom'));
        }else{
            $this->session->set_flashdata('alert_gagal', 'Gagal menambah');
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
            $tbody[]    = $row['kode_room'];
            $tbody[]    = $row['kelas'].' - '.$row['kode_kelas'];
            $tbody[]    = $row['nama_mapel'];
            $tbody[]    = $row['nama'];
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
