<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'tb_nilai';
    protected $primaryKey = 'id_nilai';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['id_nilai', 'id_prakerin', 'disiplin', 'kerja_motivasi', 'kehadiran', 'inisiatif_kreatif', 'kejujuran_tanggung_jawab', 'kesopanan', 'kerjasama', 'jumlah_nilai', 'rata_rata', 'predikat'];

    // Join table tb_nilai and tb_prakerin
    public function getAllNilai()
    {
        return $this->db->table('tb_prakerin')
            ->select('tb_prakerin.id_prakerin, tb_prakerin.nama_siswa, tb_smk.nama_sekolah, tb_nilai.disiplin, tb_nilai.kerja_motivasi, tb_nilai.inisiatif_kreatif, tb_nilai.kejujuran_tanggung_jawab, tb_nilai.kesopanan, tb_nilai.kerjasama, tb_nilai.jumlah_nilai, tb_nilai.rata_rata, tb_nilai.predikat, tb_nilai.status_nilai', )
            ->join('tb_nilai', 'tb_nilai.id_prakerin = tb_prakerin.id_prakerin', 'left')
            ->join('tb_smk', 'tb_smk.npsn = tb_prakerin.npsn', 'left')
            ->get()->getResultArray();
    }

}