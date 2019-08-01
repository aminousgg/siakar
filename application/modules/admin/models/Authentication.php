<?php
class Authentication extends CI_Model
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

    public function setup($user){
        $hasil = $this->db->get_where('admin',array('username'=>$user));
        if($hasil->num_rows()>0){
            return $hasil->row_array();
        }else{
            return false;
        }
    }
}