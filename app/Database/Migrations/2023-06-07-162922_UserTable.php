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
            'level' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'user'],
                'default' => 'user',
            ],
        ]);

        // Add primary key

        $this->forge->addKey('id_user', true);

        // Add foreign key
        $this->forge->addForeignKey('id_asisten', 'tb_asisten', 'id_asisten', 'CASCADE', 'CASCADE');

        // Create table user
        $this->forge->createTable('tb_user');


        // Add default user

        // $this->db->table('tb_user')->insert([
        //     'id_user' => 1,
        //     'username' => '21.230.0194',
        //     'password' => md5('21.230.0194'),
        //     'first_name' => 'Nasyath Faykar',
        //     'last_name' => 'UPT Komputer',
        //     'level' => 'admin',
        // ]);

        // $this->db->table('tb_user')->insert([
        //     'username' => 'user',
        //     'password' => md5('user'),
        //     'first_name' => 'User',
        //     'last_name' => 'UPT Komputer',
        //     'level' => 'user',
        // ]);
    }

    public function down()
    {
        // Drop table user
        $this->forge->dropTable('tb_user');
    }
}