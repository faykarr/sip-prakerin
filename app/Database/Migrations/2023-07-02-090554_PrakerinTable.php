<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PrakerinTable extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel prakerin
        $this->forge->addField([
            'id_prakerin' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'nisn' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'npsn' => [
                'type' => 'INT',
                'constraint' => 8,
            ],
            'nama_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
                'default' => 'Laki-laki',
            ],
            'alamat_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'jurusan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_hp_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'tahun_ajaran' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'nama_orang_tua' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_hp_orang_tua' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'periode_awal' => [
                'type' => 'DATE',
            ],
            'periode_akhir' => [
                'type' => 'DATE',
            ],
            'status_prakerin' => [
                'type' => 'ENUM',
                'constraint' => ['Aktif', 'Pencabutan'],
                'default' => 'Aktif',
            ],
        ]);

        // Menambahkan primary key
        $this->forge->addKey('id_prakerin', true);

        // Menambahkan index npsn
        $this->forge->addForeignKey('npsn', 'tb_smk', 'npsn', 'CASCADE', 'CASCADE');

        // Membuat tabel prakerin
        $this->forge->createTable('tb_prakerin');

    }

    public function down()
    {
        // menghapus tabel prakerin
        $this->forge->dropTable('tb_prakerin');
    }
}