<?php
class Admin extends CI_Model
{
   public function daftarguru(){
       return $this->db->get('guru');
   }
   public function daftarsiswa(){
       return $this->db->get('siswa');
   }
   public function tambahkelas($data){
       return $this->db->insert('kelas',$data);
   }
   public function in_jurusan($data){
       return $this->db->insert('jurusan',$data);
   }
   public function jurusan(){
       return $this->db->get('jurusan');
   }
   public function kelas(){
       return $this->db->get('kelas');
   }

   public function get_jml_kelas($kode){
       $jml=$this->db->get_where('kelas',array('kode_jurusan'=>$kode))->num_rows();
       $jml=(int)$jml/3;
       return $jml;
   }
}