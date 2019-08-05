<?php
class Auth extends CI_Model
{
    public function ceking($where){
        $this->db->where($where);
        $cek=$this->db->get('akun');
        if($cek->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }
    public function set_update($where){
        $device = $this->agent->platform().' - '.$this->agent->browser().'('.$this->agent->version().') - '.$this->input->ip_address();
        $up = array(
            'device'    => $device,
            'last_login'=> Date('Y-m-d h:i:s')
        );
        $this->db->where($where);
        return $this->db->update('akun',$up);   
    }
    public function akun_sesi($where){
        $this->db->select('level');
        $data=$this->db->get_where('akun',$where)->row_array();
        // var_dump($data['level']); die;
        if($data['level']=="siswa"){
            $ceksiswa=$this->db->get_where('siswa',array('nisn'=>$where['username']))->num_rows();
            if($ceksiswa>0){
               return $this->get_siswa($where['username'])->row_array();
            }else{
               return false;
            }
        }elseif($data['level']=="guru"){
            $cekguru=$this->db->get_where('guru',array('nip'=>$where['username']))->num_rows();
            if($cekguru>0){
               return $this->get_guru($where['username'])->row_array();
            }else{
               return false;
            }
        }
    }
    private function get_siswa($nisn){
        return $this->db->get_where('siswa',array('nisn'=>$nisn));
    }
    private function get_guru($nip){
        return $this->db->get_where('guru',array('nip'=>$nip));
    }

    public function kota(){
        return $this->db->get('regencies')->result();
    }
    public function provinsi(){
        return $this->db->get('provinces')->result();
    }
    public function kota_in($where){
        return $this->db->get_where('regencies',$where)->result();
    }
    public function kec_in($where){
        return $this->db->get_where('districts',$where)->result();
    }

    public function save_bio($data,$alamat){
        if($this->db->insert('siswa',$data)&&$this->db->insert('alamat',$alamat)){
            return true;
        }else{
            return false;
        }
    }

    public function save_bioguru($data,$alamat){
        if($this->db->insert('guru',$data)&&$this->db->insert('alamat_guru',$alamat)){
            return true;
        }else{
            return false;
        }
    }

    public function siswa($nisn){
        return $this->db->get_where('siswa',array('nisn'=>$nisn));
    }
    public function guru($nip){
        return $this->db->get_where('guru',array('nip'=>$nip));
    }
}