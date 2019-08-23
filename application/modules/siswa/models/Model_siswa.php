<?php
class Model_siswa extends CI_Model
{
    public function show_mapelsiswa($nisn){
        return $this->db->query('
            SELECT n.`id`, cr.`kode_room`, k.`kelas`, k.`kode_kelas`, n.`nisn`, s.`nama` AS nama_siswa, g.`nama` AS nama_guru, mo.`nama_mapel`
            FROM nilai n JOIN grup_kelas gk ON n.`id_grup_kelas`=gk.`id`
            JOIN siswa s ON n.`nisn`=s.`nisn`
            JOIN mata_pelajaran mp ON n.`id_mata_pelajaran`=mp.`id`
            JOIN kelas k ON gk.`id_kelas`=k.`id`
            JOIN guru g ON mp.`nip_guru`=g.`nip`
            JOIN mapel_only mo ON mp.`kode_mapel`=mo.`kode_pel`
            JOIN classroom cr ON mp.`id`=cr.`id_mata_pelajaran`
            WHERE n.`nisn` = "'.$nisn.'"
        ');
    }
}