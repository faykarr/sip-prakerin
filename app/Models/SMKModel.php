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
}