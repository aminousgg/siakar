<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url('admin/auth'));
        }
        $this->load->model('Admin','admin');
    }
	//functions
	public function index(){
        $data['judul']="Menu Utama";
        $data['sub_judul']="Dashboard";
        $data['file']="dashboard";
        $this->load->view('admin/utama',$data);
    }

    public function guru(){
        $data['judul']="Guru";
        $data['sub_judul']="Daftar guru";
        $data['file']="guru";
        $this->load->view('admin/utama',$data);
    }
    public function get_guru(){
        $response = $this->admin->daftarguru()->result_array();
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $i;
            $tbody[]    = $row['nip'];
            $tbody[]    = $row['nama'];
            $tbody[]    = $row['tmp_lahir'].", ".$row['tgl_lahir'];
            $tbody[]    = $row['no_hp'];
            $tbody[]    = $row['email'];
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

    public function siswa(){
        $data['judul']="Siswa";
        $data['sub_judul']="Daftar Siswa";
        $data['file']="siswa";
        $this->load->view('admin/utama',$data);
    }
    public function get_siswa(){
        $response = $this->admin->daftarsiswa()->result_array();
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $i;
            $tbody[]    = $row['nisn'];
            $tbody[]    = $row['nama'];
            $tbody[]    = $row['tmp_lahir'].", ".$row['tgl_lahir'];
            $tbody[]    = $row['no_hp'];
            $tbody[]    = $row['email'];
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

    public function kelas(){
        $data['judul']="Kelas";
        $data['sub_judul']="Daftar Kelas";
        $data['file']="kelas";
        $this->load->view('admin/utama',$data);
    }
    public function tambah_kelas(){
        $kode = $this->input->post('jurusan');
        $jml = $this->input->post('jml_kelas');
        for($j=0;$j<$jml;$j++){
            $cek = 0;
            $cek = $this->admin->get_jml_kelas($kode);
            $cek = (int)$cek+1;
            $tmp = 0;
            for($i=10;$i<=12;$i++){
                $kelas = array(
                    'kode_kelas'     => $kode."-".$cek,
                    'kelas'          => $i,
                    'kode_jurusan'   => $kode
                );
                if($this->admin->tambahkelas($kelas)){
                    $tmp++;
                }
            }
            if($tmp!=3){
                echo "koneksi pedot"; die;
            }
        }
        $this->session->set_flashdata('alert_success','Berhasil Menambah kelas !');
        redirect(base_url('admin/main/kelas'));
        
    }

    public function tambah_jurusan(){
        $data = array(
            'kode_jurusan' => $this->input->post('kode'),
            'jurusan'      => $this->input->post('jurusan')
        );
        $cek=0;
        for($i=10;$i<=12;$i++){
            $kelas = array(
                'kode_kelas'     => $this->input->post('kode')."-1",
                'kelas'          => $i,
                'kode_jurusan'   => $this->input->post('kode')
            );
            if($this->admin->tambahkelas($kelas)){
                $cek++;
            }
        }
        if($this->admin->in_jurusan($data)&&$cek==3){
            $this->session->set_flashdata('alert_success','Berhasil Menambah Jurusan !');
            redirect(base_url('admin/main/kelas'));
        }
    }
    public function get_jurusan(){
        $response = $this->admin->jurusan()->result_array();
        // $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $row['id'];
            $tbody[]    = $row['kode_jurusan'];
            $tbody[]    = $row['jurusan'];
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
    public function get_kelas(){
        $response = $this->admin->kelas()->result_array();
        // $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $row['id'];
            $tbody[]    = $row['kode_kelas'];
            $tbody[]    = $row['kelas'];
            $tbody[]    = $row['kode_jurusan'];
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

}
