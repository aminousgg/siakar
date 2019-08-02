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
   
   public function siswa(){
       $this->db->select('nisn, nama');
       return $this->db->get('siswa');
   }
   public function kelas(){
       return $this->db->get('kelas');
   }
   public function mapel(){
       $this->db->group_by('mapel');
       return $this->db->get('mata_pelajaran');
   }
   public function guru_mapel($mapel){
       return $this->db->query('
            SELECT mp.`id`, mp.`kode_mapel`, mp.`nip_guru`, mp.`mapel`, g.`nama`
            FROM mata_pelajaran mp JOIN guru g ON mp.`nip_guru`=g.`nip`
            WHERE mp.`mapel`="'.$mapel.'"
       ');
   }

   public function get_jml_kelas($kode){
       $jml=$this->db->get_where('kelas',array('kode_jurusan'=>$kode))->num_rows();
       $jml=(int)$jml/3;
       return $jml;
   }

   public function data_mapel($kd_mapel){
        $where = array(
            'kode_mapel' => $kd_mapel
        );
        return $this->db->get_where('mata_pelajaran',$where);
   }
   public function in_classroom($data){
       return $this->db->insert('classroom',$data);
   }
   public function get_classroom(){
       return $this->db->query('
            SELECT c.`kode_room`, c.`nisn`, s.`nama` AS nama_siswa, c.`kode_mapel`, mp.`mapel`, c.`id_kelas`, k.`kelas`, c.`nip`, g.`nama` AS nama_guru
            FROM classroom c JOIN siswa s ON c.`nisn`=s.`nisn`
            JOIN mata_pelajaran mp ON c.`kode_mapel`=mp.`kode_mapel`
            JOIN kelas k ON c.`id_kelas`=k.`id`
            JOIN guru g ON c.`nip`=g.`nip`
       ');
   }

   public function pelajaran(){
    return $this->db->get('mapel_only');
   }
   public function in_pelajaran($data){
        return $this->db->insert('mapel_only',$data);
   }
}