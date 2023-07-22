<?php

namespace App\Models;

use CodeIgniter\Model;

class PrakerinModel extends Model
{
    protected $table = 'tb_prakerin';
    protected $primaryKey = 'id_prakerin';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['id_prakerin', 'nisn', 'npsn', 'nama_siswa', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat_siswa', 'kelas', 'jurusan', 'no_hp_siswa', 'tahun_ajaran', 'nama_orang_tua', 'no_hp_orang_tua', 'periode_awal', 'periode_akhir', 'status_prakerin'];
    // Join table smk to get school name
    public function getPrakerinJoin($id_prakerin = false)
    {
        if ($id_prakerin == false) {
            return $this->db->table('tb_prakerin')
                ->join('tb_smk', 'tb_smk.npsn = tb_prakerin.npsn')
                ->get()->getResultArray();
        }

        return $this->db->table('tb_prakerin')
            ->join('tb_smk', 'tb_smk.npsn = tb_prakerin.npsn')
            ->where(['id_prakerin' => $id_prakerin])
            ->get()->getRowArray();
    }

    // Join all table from tb_nilai, tb_prakerin, tb_smk
    public function getPrakerinData()
    {
        return $this->db->table('tb_prakerin')
            ->select('tb_prakerin.*, tb_smk.nama_sekolah, tb_nilai.*')
            ->join('tb_nilai', 'tb_nilai.id_prakerin = tb_prakerin.id_prakerin', 'left')
            ->join('tb_smk', 'tb_smk.npsn = tb_prakerin.npsn', 'left')
            ->get()->getResultArray();
    }
}