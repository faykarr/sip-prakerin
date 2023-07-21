<?php

namespace App\Models;

use CodeIgniter\Model;

class SMKModel extends Model
{
    protected $table = 'tb_smk';
    protected $primaryKey = 'npsn';
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['npsn', 'nama_sekolah', 'status_sekolah', 'pembimbing_prakerin', 'no_hp_pembimbing', 'jurusan_terdaftar', 'alamat_sekolah', 'status_aktif'];

    // get count smk data
    public function getCountSMK()
    {
        return $this->countAll();
    }

    // mendapatkan jumlah siswa prakerin per smk dengan join table tb_prakerin
    public function getCountSiswaPrakerin()
    {
        $db = \Config\Database::connect(); // Connect to the database
        $builder = $db->table('tb_smk');
        $builder->select('tb_smk.npsn, tb_smk.nama_sekolah, tb_smk.status_sekolah, tb_smk.pembimbing_prakerin, tb_smk.no_hp_pembimbing, tb_smk.jurusan_terdaftar, tb_smk.alamat_sekolah, tb_smk.status_aktif, COUNT(tb_prakerin.nisn) AS prakerin_count');
        $builder->join('tb_prakerin', 'tb_smk.npsn = tb_prakerin.npsn', 'left');
        $builder->groupBy('tb_smk.npsn, tb_smk.nama_sekolah, tb_smk.status_sekolah, tb_smk.pembimbing_prakerin, tb_smk.no_hp_pembimbing, tb_smk.jurusan_terdaftar, tb_smk.alamat_sekolah, tb_smk.status_aktif');
        return $builder->get()->getResultArray();

    }
}