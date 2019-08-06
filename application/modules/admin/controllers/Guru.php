<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url('admin/auth'));
        }
        $this->load->model('Admin','admin');
    }
	public function index(){
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
            $aksi = '<button class="btn btn-info edit_guru" data-id="'.$row['id'].'" type="button" data-toggle="modal" data-target="#edit_guru_m"><i class="fa fa-paste"></i> Edit</button>';
            $aksi .= '<button class="btn btn-danger hapus" type="button"><i class="fa fa-trash-o"></i> <span class="bold">Hapus</span></button>';
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
    public function view_edit(){
        $id =  $this->input->get('id');
        echo json_encode($this->db->get_where('guru',array('id'=>$id))->row_array());
    }
    public function in_edit(){
        $data = array(
            'nip'           => $this->input->post('nip'),
            'nama'          => $this->input->post('nama'),
            'tmp_lahir'     => $this->input->post('tmp_lahir'),
            'tgl_lahir'     => $this->input->post('tgl_lahir'),
            'gender'        => $this->input->post('gender'),
            'agama'         => $this->input->post('agama'),
            'golongan_darah'=> $this->input->post('goldar'),
            'jabatan'       => $this->input->post('jabatan'),
            'status'        => $this->input->post('status'),
            'tgl_masuk'     => $this->input->post('tgl_masuk'),
            'no_hp'         => $this->input->post('no_hp'),
            'email'         => $this->input->post('email'),
            'kode_pos'      => "",
        );
        var_dump($data);
    }
}
