<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SMKTable extends Migration
{
    public function up()
    {
        // Make field for table smk
        $this->forge->addField([
            'npsn' => [
                'type' => 'INT',
                'constraint' => 8,
            ],
            'nama_sekolah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'status_sekolah' => [
                'type' => 'ENUM',
                'constraint' => ['Negeri', 'Swasta'],
                'default' => 'Negeri',
            ],
            'pembimbing_prakerin' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_hp_pembimbing' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'jurusan_terdaftar' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat_sekolah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'status_aktif' => [
                'type' => 'ENUM',
                'constraint' => ['Aktif', 'Tidak Aktif'],
                'default' => 'Aktif',
            ],
        ]);

        // Add primary key

        $this->forge->addKey('npsn', true);

        // Create table smk

        $this->forge->createTable('tb_smk');

    }

    public function down()
    {
        // drop tb_smk
        $this->forge->dropTable('tb_smk');
    }
}
