<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistenModel extends Model
{
    protected $table = 'tb_asisten';
    protected $primaryKey = 'id_asisten';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['nama_asisten', 'nim', 'no_hp', 'email', 'alamat', 'jabatan', 'id_user', 'status'];
}