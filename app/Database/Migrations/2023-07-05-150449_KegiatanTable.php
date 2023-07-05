<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KegiatanTable extends Migration
{
    public function up()
    {
        // Create kegiatan table
        $this->forge->addField([
            'id_kegiatan' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'id_asisten' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'asisten_pembantu' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'waktu' => [
                'type' => 'TIME',
            ],
            'ruang_lab' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'detail_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ]
        ]);

        $this->forge->addKey('id_kegiatan', true);
        $this->forge->addForeignKey('id_asisten', 'tb_asisten', 'id_asisten', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_kegiatan');

    }

    public function down()
    {
        // Drop kegiatan table
        $this->forge->dropTable('tb_kegiatan');
    }
}