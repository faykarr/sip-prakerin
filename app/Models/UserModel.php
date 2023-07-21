<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['username', 'password', 'level', 'id_asisten'];

    // Join tb_asisten
    public function getAsisten()
    {
        return $this->db->table('tb_user')
            ->join('tb_asisten', 'tb_asisten.id_asisten = tb_user.id_asisten')
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

    // Get asisten by id_asisten with join tb_asisten
    public function getAsistenById($id_asisten)
    {
        return $this->db->table('tb_user')
            ->join('tb_asisten', 'tb_asisten.id_asisten = tb_user.id_asisten')
            ->where('tb_user.id_asisten', $id_asisten)
            ->get()->getRowArray();
    }
}