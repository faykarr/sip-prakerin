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


}