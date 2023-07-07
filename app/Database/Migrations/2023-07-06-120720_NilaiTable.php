<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiTable extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel nilai  `id_nilai`, `id_prakerin`, `nilai_absensi`, `nilai_sikap`, `nilai_pengetahuan`, `nilai_keterampilan`, `nilai_akhir`, `nilai_rata_rata`
        $this->forge->addField([
            'id_nilai' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => TRUE
            ],
            'id_prakerin' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nilai_absensi' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nilai_sikap' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nilai_pengetahuan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nilai_keterampilan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nilai_akhir' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nilai_rata_rata' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_nilai', TRUE);
        // Membuat foreign key
        // $this->forge->addForeignKey('id_prakerin', 'prakerin', 'id_prakerin', 'CASCADE', 'CASCADE');
        // Membuat table tb_nilai
        $this->forge->createTable('tb_nilai');

    }

    public function down()
    {
        // menghapus tabel nilai
        $this->forge->dropTable('nilai');
    }
}