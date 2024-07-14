<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddSMKSeeder extends Seeder
{
    public function run()
    {
        // Add 10 data smk with faker
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'npsn' => $faker->numberBetween(10000000, 99999999),
                'nama_sekolah' => $faker->company,
                'status_sekolah' => $faker->randomElement(['Negeri', 'Swasta']),
                'pembimbing_prakerin' => $faker->name,
                'no_hp_pembimbing' => $faker->phoneNumber,
                'jurusan_terdaftar' => $faker->randomElement(['RPL', 'TKJ', 'MM', 'AK']),
                'alamat_sekolah' => $faker->address,
                'status_aktif' => 'Aktif',
            ];
            $this->db->table('tb_smk')->insert($data);
        }
    }
}
