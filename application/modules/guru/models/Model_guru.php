<?php
class Model_guru extends CI_Model
{
    public function show_ajar($where){
        return $this->db->query('
        SELECT cr.`kode_room`, cr.`id_mata_pelajaran`, mp.`kode_mapel`, mo.`nama_mapel`, cr.`kode_walikelas`, wk.`id_kelas`, k.`kelas`, k.`kode_kelas`, g.`nama`
        FROM classroom cr JOIN mata_pelajaran mp ON cr.`id_mata_pelajaran`=mp.`id`
        JOIN walikelas wk ON cr.`kode_walikelas`=wk.`kode_wali`
        JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
        JOIN kelas k ON wk.`id_kelas`=k.`id`
        JOIN guru g ON mp.`nip_guru`=g.`nip`
        WHERE mp.`nip_guru`="'.$where.'"
        ');
    }
    public function walikelas($where){
        return $this->db->query('
        SELECT gk.`id`, gk.`nisn`, s.`nama`, r.`name` AS tmp_lahir, s.`tgl_lahir`, s.`gender`, s.`no_hp`
        FROM grup_kelas gk JOIN siswa s ON gk.`nisn`=s.`nisn`
        JOIN kelas k ON gk.`id_kelas`=k.`id`
        JOIN walikelas wk ON gk.`kode_walikelas`=wk.`kode_wali`
        JOIN regencies r ON s.`tmp_lahir`=r.`id`
        WHERE wk.`nip_guru`="'.$where.'"
        ');
    }
    public function siswabymapel($where){
        $nip=$this->session->userdata('sesi')['nip'];
        return $this->db->query('
        SELECT n.`id`, k.`kelas`, k.`kode_kelas`, n.`nisn`, s.`nama` AS nama_siswa, s.`gender`, s.`no_hp`, g.`nama` AS nama_guru, mo.`nama_mapel`, n.`nilai_tugas`,n.`nilai_uts`, n.`nilai_uas`
        FROM nilai n JOIN grup_kelas gk ON n.`id_grup_kelas`=gk.`id`
        JOIN siswa s ON n.`nisn`=s.`nisn`
        JOIN mata_pelajaran mp ON n.`id_mata_pelajaran`=mp.`id`
        JOIN kelas k ON gk.`id_kelas`=k.`id`
        JOIN guru g ON mp.`nip_guru`=g.`nip`
        JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
        WHERE g.`nip`="'.$nip.'" AND mp.`kode_mapel`="'.$where.'"
        ');
    }
    public function showmapel($where){
        return $this->db->query('
        SELECT mp.`id`, mp.`kode_mapel`, mo.`nama_mapel`
        FROM mata_pelajaran mp JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
        WHERE mp.`nip_guru`="'.$where.'"
        ');
    }

    public function shownilai($where){
        $nip=$this->session->userdata('sesi')['nip'];
        return $this->db->query('
        SELECT n.`id`, k.`kelas`, k.`kode_kelas`, n.`nisn`, s.`nama` AS nama_siswa, s.`gender`, s.`no_hp`, g.`nama` AS nama_guru, mo.`nama_mapel`, n.`nilai_tugas`,n.`nilai_uts`, n.`nilai_uas`
        FROM nilai n JOIN grup_kelas gk ON n.`id_grup_kelas`=gk.`id`
        JOIN siswa s ON n.`nisn`=s.`nisn`
        JOIN mata_pelajaran mp ON n.`id_mata_pelajaran`=mp.`id`
        JOIN kelas k ON gk.`id_kelas`=k.`id`
        JOIN guru g ON mp.`nip_guru`=g.`nip`
        JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
        WHERE g.`nip`="'.$nip.'" AND mp.`kode_mapel`="'.$where.'"
        ');
    }
}