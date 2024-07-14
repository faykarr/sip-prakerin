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
    // public function getAsistenByUsername($username)
    // {
    //     return $this->db->table('tb_user')
    //         ->join('tb_asisten', 'tb_asisten.id_asisten = tb_user.id_asisten')
    //         ->where('username', $username)
    //         ->where('status', 'Aktif')
    //         ->get()->getRowArray();
    // }

    public function getAsistenByUsername($username)
    {
        // Step 1: Fetch user data based on username
        $userData = $this->db->table('tb_user')
            ->where('username', $username)
            ->get()->getRowArray();

        // Step 2: Check if id_asisten is set for the user
        if (!empty($userData) && isset($userData['id_asisten']) && !empty($userData['id_asisten'])) {
            // Step 3: If id_asisten is set, perform the join to fetch asisten data
            $userAsistenData = $this->db->table('tb_user')
                ->join('tb_asisten', 'tb_asisten.id_asisten = tb_user.id_asisten')
                ->where('tb_user.username', $username)
                ->where('status', 'Aktif')
                ->get()->getRowArray();
            return $userAsistenData ?: $userData; // Return joined data if available, else return basic user data
        } else {
            // Step 4: If id_asisten is not set, return the user data as is (e.g., for admin accounts)
            return $userData;
        }
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
