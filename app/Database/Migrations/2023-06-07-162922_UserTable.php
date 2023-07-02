<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTable extends Migration
{
    public function up()
    {
        // Make field for table user
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'id_asisten' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            // Password encrypted with MD5
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 32,
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'level' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'user'],
                'default' => 'user',
            ],
        ]);

        // Add primary key

        $this->forge->addKey('id_user', true);

        // Create table user

        $this->forge->createTable('tb_user');

        // Add default user

        $this->db->table('tb_user')->insert([
            'username' => 'admin',
            'password' => md5('admin'),
            'first_name' => 'Admin',
            'last_name' => 'UPT Komputer',
            'level' => 'admin',
        ]);

        $this->db->table('tb_user')->insert([
            'username' => 'user',
            'password' => md5('user'),
            'first_name' => 'User',
            'last_name' => 'UPT Komputer',
            'level' => 'user',
        ]);
    }

    public function down()
    {
        // Drop table user
        $this->forge->dropTable('tb_user');
    }
}