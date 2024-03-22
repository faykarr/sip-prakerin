<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AsistenTable extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel asisten
        $this->forge->addField([
            'id_asisten' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'nama_asisten' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Aktif', 'Tidak Aktif'],
                'default' => 'Aktif',
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_asisten', true);

        // Membuat relasi dengan table tb_user dengan cascade
        // $this->forge->addForeignKey('id_user', 'tb_user', 'id_user', 'CASCADE', 'CASCADE');
        // Membuat tabel asisten
        $this->forge->createTable('tb_asisten');
        // Insert 10 data ke tabel asisten
        // $faker = \Faker\Factory::create('id_ID');
        // for ($i = 0; $i < 10; $i++) {
        //     $data = [
        //         'nama_asisten' => $faker->name,
        //         'nim' => $faker->randomNumber(9, true),
        //         'no_hp' => $faker->phoneNumber,
        //         'email' => $faker->email,
        //         'alamat' => $faker->address,
        //         'jabatan' => $faker->jobTitle,
        //         'id_user' => $faker->numberBetween(1, 10),
        //         'status' => $faker->randomElement(['Aktif', 'Tidak Aktif']),
        //     ];
        //     $this->db->table('tb_asisten')->insert($data);
        // }

        // Insert 1 default Koordinator asisten
        $data = [
            'nama_asisten' => 'Nasyath Faykar',
            'nim' => '21.230.0194',
            'no_hp' => '08123456789',
            'email' => 'koor@uptkomp.com',
            'alamat' => 'Jl. Jalan',
            'jabatan' => 'Koordinator',
            'id_user' => 1,
            'status' => 'Aktif',
        ];
        $this->db->table('tb_asisten')->insert($data);
        // Call addTrigger() function
        $this->addTrigger();



    }

    // Add trigger
    public function addTrigger()
    {
        $this->db->query('CREATE TRIGGER tambah_user AFTER INSERT ON tb_asisten
        FOR EACH ROW
        BEGIN
            DECLARE level_val VARCHAR(50);
            DECLARE password_val VARCHAR(32);
        
            IF NEW.jabatan IN (\'Koordinator\', \'Administrator\') THEN
                SET level_val = \'admin\';
            ELSE
                SET level_val = \'user\';
            END IF;
        
            SET password_val = MD5(NEW.nim);
        
            INSERT INTO tb_user (username, password, level, id_asisten)
            VALUES (NEW.nim, password_val, level_val, NEW.id_asisten);
        END');
        
        // Create trigger update when update jabatan
        $this->db->query('CREATE TRIGGER update_user AFTER UPDATE ON tb_asisten
        FOR EACH ROW
        BEGIN
            DECLARE level_val VARCHAR(50);
        
            IF NEW.jabatan IN (\'Koordinator\', \'Administrator\') THEN
                SET level_val = \'admin\';
            ELSE
                SET level_val = \'user\';
            END IF;
        
            UPDATE tb_user
            SET level = level_val
            WHERE id_asisten = NEW.id_asisten;
        END');
    }

    public function down()
    {
        // menghapus tabel asisten
        $this->forge->dropTable('tb_asisten');
    }
}