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

        // Panggil methode trigger
        $this->addTriggerUpdate();
        $this->addTriggerInsert();
        $this->addEventUpdateStatusPrakerin();
    }

    public function addTriggerUpdate()
    {
        $this->db->query('CREATE TRIGGER tr_update_update_status_prakerin
            BEFORE UPDATE ON tb_prakerin
            FOR EACH ROW
            BEGIN
                IF DATE(NEW.periode_akhir) < CURDATE() THEN
                    SET NEW.status_prakerin = \'Pencabutan\';
                ELSE
                    SET NEW.status_prakerin = \'Aktif\';
                END IF;
            END');
    }

    public function addTriggerInsert()
    {
        $this->db->query('CREATE TRIGGER tr_insert_update_status_prakerin
            BEFORE INSERT ON tb_prakerin
            FOR EACH ROW
            BEGIN
                IF DATE(NEW.periode_akhir) < CURDATE() THEN
                    SET NEW.status_prakerin = \'Pencabutan\';
                ELSE
                    SET NEW.status_prakerin = \'Aktif\';
                END IF;
            END');
    }

    public function addEventUpdateStatusPrakerin()
    {
        $this->db->query("SET @@global.event_scheduler = ON;"); // Ensure the event scheduler is enabled

        $this->db->query("CREATE DEFINER=`root`@`localhost` EVENT `update_status_prakerin_event`
            ON SCHEDULE EVERY 3 HOUR
            STARTS '2023-07-05 13:12:43'
            ON COMPLETION NOT PRESERVE
            ENABLE
            DO
            UPDATE tb_prakerin
            SET status_prakerin = 'Pencabutan'
            WHERE periode_akhir < CURDATE();");
    }

    // Method downEventUpdateStatusPrakerin
    public function downEventUpdateStatusPrakerin()
    {
        $this->db->query('DROP EVENT IF EXISTS update_status_prakerin_event');
    }

    public function downTriggerUpdate()
    {
        $this->db->query('DROP TRIGGER IF EXISTS tr_update_update_status_prakerin');
        $this->db->query('DROP TRIGGER IF EXISTS tr_insert_update_status_prakerin');
    }


    public function down()
    {
        // menghapus tabel prakerin
        $this->forge->dropTable('tb_prakerin');

        // memanggil methode downTriggerUpdate
        $this->downTriggerUpdate();

        // memanggil methode downEventUpdateStatusPrakerin
        $this->downEventUpdateStatusPrakerin();
    }
}