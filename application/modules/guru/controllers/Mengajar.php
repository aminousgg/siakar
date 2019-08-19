<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mengajar extends CI_Controller {
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
        if($this->input->get('nip')==null){
            $data['judul']="Mengajar";
            $data['sub_judul']="Mata Pelajaran yang di ajar";
            $data['file']="mengajar";
            $this->load->view('guru/utama',$data);
        }else{
            $nip = $this->input->get('nip');
            $response = $this->guru->show_ajar($nip)->result_array();
            $i=1;
            foreach($response as $row)
            {
                $tbody      = array();
                $tbody[]    = $i;
                $tbody[]    = $row['kode_room'];
                $tbody[]    = "<a href='".base_url('guru/mengajar/daftarsiswabymapel')."/".$row['kode_mapel']."'>".$row['nama_mapel']."</a>";
                $tbody[]    = $row['kelas'].' - '.$row['kode_kelas'];
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

    public function daftarsiswabymapel($mapel){
        $this->db->select('nama_mapel');
        $nama_mapel=$this->db->get_where('mapel_only',array('kode_pel'=>$mapel))->row_array()['nama_mapel'];
        $data['judul']="Mengajar";
        $data['sub_judul']="Daftar Siswa Mata Pelajaran ".$nama_mapel;
        $data['kode_mapel']=$mapel;
        $data['file']="detail_mengajar";
        $this->load->view('guru/utama',$data);
    }
    public function show_siswabymapel($mapel){
        $response = $this->guru->siswabymapel($mapel)->result_array();
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $i;
            $tbody[]    = $row['nisn'];
            $tbody[]    = $row['nama_siswa'];
            $tbody[]    = $row['kelas'].' - '.$row['kode_kelas'];
            $tbody[]    = $row['gender'];
            $tbody[]    = $row['no_hp'];
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
