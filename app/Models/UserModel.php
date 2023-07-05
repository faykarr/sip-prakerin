<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['username', 'password', 'first_name', 'last_name', 'level'];

    // Join tb_asisten
    public function getAsisten()
    {
        return $this->db->table('tb_user')
            ->join('tb_asisten', 'tb_asisten.id_user = tb_user.id_user')
            ->get()->getResultArray();
    }

    // Get asisten by username with join tb_asisten
    public function getAsistenByUsername($username)
    {
        return $this->db->table('tb_user')
            ->join('tb_asisten', 'tb_asisten.id_asisten = tb_user.id_asisten')
            ->where('username', $username)
            ->get()->getRowArray();
    }
}