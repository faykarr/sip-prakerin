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

        // Menambahkan 10 data pada tabel prakerin menggunakan faker dengan npsn diambil dari tb_smk
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 200; $i++) {
            $data = [
                'nisn' => $faker->unique()->randomNumber(8),
                'npsn' => $faker->randomElement($this->db->table('tb_smk')->select('npsn')->get()->getResultArray()),
                'nama_siswa' => $faker->name(),
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->date(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat_siswa' => $faker->address(),
                'kelas' => $faker->randomElement(['X', 'XI', 'XII']),
                'jurusan' => $faker->randomElement(['RPL', 'TKJ', 'MM', 'BC']),
                'no_hp_siswa' => $faker->numberBetween(10000000, 99999999),
                'tahun_ajaran' => $faker->randomElement(['2018/2019', '2019/2020', '2020/2021', '2021/2022']),
                'nama_orang_tua' => $faker->name(),
                'no_hp_orang_tua' => $faker->numberBetween(10000000, 99999999),
                'periode_awal' => $faker->date(),
                'periode_akhir' => $faker->date(),
                'status_prakerin' => $faker->randomElement(['Aktif', 'Pencabutan']),
            ];
            $this->db->table('tb_prakerin')->insert($data);
        }
    }

    public function down()
    {
        // menghapus tabel prakerin
        $this->forge->dropTable('tb_prakerin');
    }
}