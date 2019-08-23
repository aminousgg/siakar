<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perwalian extends CI_Controller {
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
	public function index(){
        if( !$this->input->get() ){
            $data['judul']="Perwalian";
            $data['sub_judul']="Walikelas";
            $data['file']="perwalian";
            $this->load->view('guru/utama',$data);
        }else{
            if($this->input->get('detail')=="siswa"){
                $data['judul']="Perwalian";
                $data['sub_judul']="Walikelas";
                $data['file']="perwalian-datasiswa";
                $this->load->view('guru/utama',$data);
            }else{
                $nip=$this->input->get('nip');
                $response = $this->guru->walikelas($nip)->result_array();
                $i=1;
                foreach($response as $row)
                {
                    $tbody      = array();
                    $tbody[]    = $i;
                    $tbody[]    = $row['nisn'];
                    $tbody[]    = $row['nama'];
                    $tbody[]    = $row['tmp_lahir'].", ".$row['tgl_lahir'];
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
        
    }
}