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
        // $data = [
        //     'nama_asisten' => 'Akun Admin',
        //     'nim' => 'akun_admin',
        //     'no_hp' => '08123456789',
        //     'email' => 'koor@uptkomp.com',
        //     'alamat' => 'Jl. Jalan',
        //     'jabatan' => 'Koordinator',
        //     'status' => 'Aktif',
        // ];
        // $this->db->table('tb_asisten')->insert($data);


    }

    public function down()
    {
        // menghapus tabel asisten
        $this->forge->dropTable('tb_asisten');
    }
}
