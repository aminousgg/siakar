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
        SELECT cr.`kode_room`, cr.`id_mata_pelajaran`, mp.`kode_mapel`, mo.`nama_mapel`, cr.`kode_walikelas`, wk.`id_kelas`, k.`kelas`, k.`kode_kelas`, g.`nama`
        FROM classroom cr JOIN mata_pelajaran mp ON cr.`id_mata_pelajaran`=mp.`id`
        JOIN walikelas wk ON cr.`kode_walikelas`=wk.`kode_wali`
        JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
        JOIN kelas k ON wk.`id_kelas`=k.`id`
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
   public function akun($who){
       return $this->db->get_where('akun',array('level'=>$who));
   }
   public function walikelas(){
       return $this->db->query('
            SELECT wk.`id`, wk.`kode_wali`, wk.`id_kelas`, wk.`tahun_ajaran`, k.`kelas`, k.`kode_jurusan`, j.`jurusan`, k.`kode_kelas`, wk.`nip_guru`, g.`nama`
            FROM walikelas wk JOIN kelas k ON wk.`id_kelas`=k.`id`
            JOIN guru g ON wk.`nip_guru`=g.`nip`
            JOIN jurusan j ON k.`kode_jurusan`=j.`kode_jurusan`
       ');
   }

   public function tambahakun($data){
       return $this->db->insert('akun',$data);
   }
   public function grub_kelas(){
      return $this->db->query('
            SELECT gk.`id`, gk.`nisn`, s.`nama` AS nama_siswa, gk.`id_kelas`, k.`kelas`, k.`kode_kelas`, g.`nama` AS nama_guru
            FROM grup_kelas gk JOIN siswa s ON gk.`nisn`=s.`nisn`
            JOIN kelas k ON gk.`id_kelas`=k.`id`
            JOIN walikelas wk ON gk.`kode_walikelas`=wk.`kode_wali`
            JOIN guru g ON wk.`nip_guru`=g.`nip`
       ');
   }
   public function get_walikelas(){
       return $this->db->query('
        SELECT k.`id`, k.`kelas`, k.`kode_kelas`
        FROM walikelas wk JOIN kelas k ON wk.`id_kelas`=k.`id`
       ');
   }
   public function ambil_kodewalikelas($kelas_id){
       return $this->db->query('
            SELECT k.`id`, k.`kelas`, k.`kode_kelas`, wk.`kode_wali`
            FROM walikelas wk JOIN kelas k ON wk.`id_kelas`=k.`id`
            WHERE k.`id`="'.$kelas_id.'"
        ')->row_array();
   }
   public function walikelas_get(){
        return $this->db->query('
            SELECT wk.`id`, wk.`kode_wali`, wk.`id_kelas`, k.`kelas`, k.`kode_kelas`
            FROM walikelas wk JOIN kelas k ON wk.`id_kelas`=k.`id`
        ');
   }
   public function guru_pengajar(){
        return $this->db->query('
            SELECT mp.`id`, mp.`kode_mapel`, mo.`nama_mapel`, mp.`nip_guru`, g.`nama`
            FROM mata_pelajaran mp JOIN guru g ON mp.`nip_guru`=g.`nip`
            JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
        ');
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
   public function update_guru($where,$data){
        $this->db->where('nip',$where);
        $data = $this->db->update('guru',$data);
        return $data;
   }
   public function update_alamat($where,$alamat){
    
    $this->db->where('kode',$where);
    // var_dump($where); die;
    return $this->db->update('alamat_guru',$alamat);
    
   }
   public function daftarnilai($id=null){
       if($id==null){
           return $this->db->query('
            SELECT n.`id`, k.`kelas`, k.`kode_kelas`, n.`nisn`, s.`nama` AS nama_siswa, g.`nama` AS nama_guru, mo.`nama_mapel`, n.`nilai_tugas`,n.`nilai_uts`, n.`nilai_uas`
            FROM nilai n JOIN grup_kelas gk ON n.`id_grup_kelas`=gk.`id`
            JOIN siswa s ON n.`nisn`=s.`nisn`
            JOIN mata_pelajaran mp ON n.`id_mata_pelajaran`=mp.`id`
            JOIN kelas k ON gk.`id_kelas`=k.`id`
            JOIN guru g ON mp.`nip_guru`=g.`nip`
            JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
           ');
       }else{
            return $this->db->query('
            SELECT n.`id`, k.`kelas`, k.`kode_kelas`, n.`nisn`, s.`nama` AS nama_siswa, g.`nama` AS nama_guru, mo.`nama_mapel`, n.`nilai_tugas`,n.`nilai_uts`, n.`nilai_uas`
            FROM nilai n JOIN grup_kelas gk ON n.`id_grup_kelas`=gk.`id`
            JOIN siswa s ON n.`nisn`=s.`nisn`
            JOIN mata_pelajaran mp ON n.`id_mata_pelajaran`=mp.`id`
            JOIN kelas k ON gk.`id_kelas`=k.`id`
            JOIN guru g ON mp.`nip_guru`=g.`nip`
            JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
            WHERE n.`id`="'.$id.'"
        ');
       }
   }
}