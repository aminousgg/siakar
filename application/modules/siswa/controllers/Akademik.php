<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('sesi')){
            redirect(base_url('login_siswa'));
        }
        if($this->session->userdata('sesi')['level']!='siswa'){
            redirect(base_url('login_siswa'));
        }
        if($this->session->userdata('sesi')=='private'){
            redirect(base_url('auth/siswa_baru'));
        }
        $this->load->model('Model_siswa','siswa');
    }
	//functions
	public function mapel(){
        $data['judul']="Mata Pelajaran";
        $data['sub_judul']="Mata Pelajaran Diampu";
        $data['file']="matapelajaran";
        $this->load->view('siswa/utama',$data);
    }
    public function get_mapelsiswa(){
        $nisn = $this->input->get('nisn');
        $response = $this->siswa->show_mapelsiswa($nisn)->result_array();
        $i=1;
        foreach($response as $row)
        {
            $tbody      = array();
            $tbody[]    = $i;
            $tbody[]    = $row['kode_room'];
            $tbody[]    = $row['kelas'].' - '.$row['kode_kelas'];
            $tbody[]    = $row['nama_mapel'];
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
}
