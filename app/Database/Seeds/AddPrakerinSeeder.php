<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddPrakerinSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan 10 data pada tabel prakerin menggunakan faker dengan npsn diambil dari tb_smk
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'nisn' => $faker->unique()->randomNumber(8),
                'npsn' => $faker->randomElement($this->db->table('tb_smk')->select('npsn')->get()->getResultArray()),
                'nama_siswa' => $faker->name(),
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->date(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat_siswa' => $faker->address(),
                'kelas' => $faker->randomElement(['X', 'XI', 'XII']),
                'jurusan' => $faker->randomElement(['RPL', 'TKJ', 'MM']),
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
}
