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
        $data = $this->db->query('
        SELECT * 
        FROM guru g JOIN alamat_guru a ON g.`nip`=a.`kode`
        WHERE g.`id`="'.$this->input->get('id').'"
        ')->row_array();
        echo json_encode($data);
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
            'jabatan'       => $this->input->post('jabatan'),
            'kode_pos'      => "",
        );
        $alamat = array(
            'kode' => $this->input->post('nip'),
            'detail' => $this->input->post('detail'),
            'kecamatan' => $this->input->post('kec'),
            'kota_kab'  => $this->input->post('kota'),
            'provinsi'  => $this->input->post('prov')
        );
        // var_dump($data);
        $nip_awal=$this->input->post('nip_awal');
        if( $this->admin->update_guru($nip_awal,$data)&&$this->admin->update_alamat($nip_awal,$alamat) ) {
            $this->session->set_flashdata('alert_success','Berhasil mengubah');
            redirect(base_url('admin/guru'));
        }
    }
    public function get_kota(){
        echo json_encode($this->admin->kota());
    }
    public function get_prov(){
        echo json_encode($this->admin->provinsi());
    }
    public function kotaFromprov(){
        $id = $this->input->get('id');
        $where = array(
            'province_id' => $id
        );
        echo json_encode($this->admin->kota_in($where));
    }
    public function kecFromkota(){
        $id = $this->input->get('id');
        $where = array(
            'regency_id' => $id
        );
        echo json_encode($this->admin->kec_in($where));
    }
}
