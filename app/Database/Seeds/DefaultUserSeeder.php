<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    public function run()
    {
        // Add default user

        $this->db->table('tb_user')->insert([
            'username' => 'akun_admin',
            'password' => md5('akun_admin'),
            'level' => 'admin',
        ]);

        $this->db->table('tb_user')->insert([
            'username' => 'akun_asisten',
            'password' => md5('akun_asisten'),
            'level' => 'user',
        ]);
    }
}
