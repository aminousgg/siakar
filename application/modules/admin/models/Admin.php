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
       return $this->db->get('mapel_only');
   }
   public function guru_mapel($mapel){
       return $this->db->query('
            SELECT mp.`id`, mp.`kode_mapel`, mo.`nama_mapel`, mp.`nip_guru`, g.`nama`
            FROM mata_pelajaran mp JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
            JOIN guru g ON mp.`nip_guru`=g.`nip`
            WHERE mo.`nama_mapel`="'.$mapel.'"
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
            SELECT cr.`id`, cr.`kode_room`, cr.`nisn`, s.`nama` AS nama_siswa, cr.`id_mata_pelajaran`, mo.`nama_mapel`, k.`kelas`, k.`kode_kelas`, g.`nip`, g.`nama` AS nama_guru
            FROM classroom cr JOIN siswa s ON cr.`nisn`=s.`nisn`
            JOIN mata_pelajaran mp ON cr.`id_mata_pelajaran`=mp.`id`
            JOIN kelas k ON cr.`id_kelas`=k.`id`
            JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
            JOIN guru g ON mp.`nip_guru`=g.`nip`
       ');
   }

   public function pelajaran(){
    return $this->db->get('mapel_only');
   }
   public function in_pelajaran($data){
        return $this->db->insert('mapel_only',$data);
   }

   public function mapel_ajaran(){
       return $this->db->query('
            SELECT mp.`id`, mp.`kode_mapel`, mo.`nama_mapel`, mp.`nip_guru`, g.`nama`
            FROM mata_pelajaran mp JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
            JOIN guru g ON mp.`nip_guru`=g.`nip`
       ');
   }

   public function in_pengajar($data){
       return $this->db->insert('mata_pelajaran',$data);
   }
   public function cek_pengajar($data){
       $cek = $this->db->get_where('mata_pelajaran',$data);
       if($cek->num_rows()>0){
           return false; // konfirmasi jika ada = flase
       }else{
           return true;
       }
   }
}