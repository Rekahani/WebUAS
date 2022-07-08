<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WargaSeeder extends Seeder
{
  public function run()
  {

    $faker = \Faker\Factory::create('id_ID');

    for ($i = 1; $i <= 352; $i++) {
      $data = [
        'nik'      => $faker->unique()->numberBetween(3204070004970010, 3204092312990099),
        'nama'     => $faker->name,
        'kelamin'  => $faker->randomElement(['L', 'P']),
        'alamat'   => $faker->address,
        'no_rumah' => $faker->numberBetween(100, 999),
        'status'   => $faker->randomElement(['1', '2'])
      ];
      $this->db->table('warga')->insert($data);
    }




    // Simple Queries
    // $this->db->query('INSERT INTO warga (nik, nama , kelamin , alamat, no_rumah , status ) VALUES(:nik:, :nama:, :kelamin:, :alamat:, :no_rumah:, :status:)', $data);

    // Using Query Builder

    // inser banyak data
    // $this->db->table('warga')->insertBatch($data);
  }
}