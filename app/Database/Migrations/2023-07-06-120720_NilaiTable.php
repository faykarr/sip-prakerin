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

        // Add trigger
        $this->db->query('CREATE TRIGGER `set_predikat` BEFORE INSERT ON `tb_nilai`
        FOR EACH ROW
        BEGIN
            IF NEW.rata_rata BETWEEN 85 AND 100 THEN
                SET NEW.predikat = \'Sempurna\';
            ELSEIF NEW.rata_rata BETWEEN 75 AND 84 THEN
                SET NEW.predikat = \'Pujian\';
            ELSEIF NEW.rata_rata BETWEEN 65 AND 74 THEN
                SET NEW.predikat = \'Baik\';
            ELSEIF NEW.rata_rata BETWEEN 55 AND 64 THEN
                SET NEW.predikat = \'Cukup\';
            ELSEIF NEW.rata_rata BETWEEN 0 AND 54 THEN
                SET NEW.predikat = \'Kurang\';
            END IF;
        END');

        // Add trigger
        $this->db->query('CREATE TRIGGER `update_predikat` BEFORE UPDATE ON `tb_nilai`
        FOR EACH ROW
        BEGIN
            IF NEW.rata_rata BETWEEN 85 AND 100 THEN
                SET NEW.predikat = \'Sempurna\';
            ELSEIF NEW.rata_rata BETWEEN 75 AND 84 THEN
                SET NEW.predikat = \'Pujian\';
            ELSEIF NEW.rata_rata BETWEEN 65 AND 74 THEN
                SET NEW.predikat = \'Baik\';
            ELSEIF NEW.rata_rata BETWEEN 55 AND 64 THEN
                SET NEW.predikat = \'Cukup\';
            ELSEIF NEW.rata_rata BETWEEN 0 AND 54 THEN
                SET NEW.predikat = \'Kurang\';
            END IF;
        END');

    }

    public function down()
    {
        // menghapus tabel nilai
        $this->forge->dropTable('nilai');
    }
}