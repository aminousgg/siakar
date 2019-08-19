<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_nilai extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('sesi')){
            redirect(base_url('login_guru'));
        }
        if($this->session->userdata('sesi')['level']!='guru'){
            redirect(base_url('login_guru'));
        }
        if($this->session->userdata('sesi')=='private'){
            redirect(base_url('auth/siswa_baru'));
        }
        if($this->session->userdata('sesi')=='private_guru'){
            redirect(base_url('auth/guru_baru'));
        }
        $this->load->model('Model_guru','guru');
    }
	//functions
    public function index(){
        $data['judul']="Daftar Nilai";
        $data['sub_judul']="Nilai";
        $data['file']="daftar_nilai";
        $this->load->view('guru/utama',$data);
    }
    public function get_mapel(){
        $nip = $this->input->get('nip');
        echo json_encode($this->guru->showmapel($nip)->result());
    }

    public function show(){
        $mapel = $this->input->get('mapel');
        $response = $this->guru->shownilai($mapel)->result_array();
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $row['nisn'];
            $tbody[]    = $row['nama_siswa'];
            $tbody[]    = $row['kelas'].' - '.$row['kode_kelas'];
            $tbody[]    = $row['nilai_tugas'];
            $tbody[]    = $row['nilai_uts'];
            $tbody[]    = $row['nilai_uas'];
            $tbody[]    = "soon";
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
}
