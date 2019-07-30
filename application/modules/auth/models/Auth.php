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
        if($data['level']=="siswa"){
            $ceksiswa=$this->db->get_where('siswa',array('nisn'=>$where['username']))->num_rows();
            if($ceksiswa>0){
               return $this->get_siswa($where['username'])->row_array();
            }else{
               return false;
            }
        }elseif($data['level']=="guru"){

        }
    }
    private function get_siswa($nisn){
        return $this->db->get_where('siswa',array('nisn'=>$nisn));
    }
}