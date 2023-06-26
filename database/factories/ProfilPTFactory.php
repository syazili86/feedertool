<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfilPT>
 */
class ProfilPTFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_perguruan_tinggi' => $this->faker->uuid(),
            'kode_perguruan_tinggi' => $this->faker->randomNumber(6, true),
            'nama_perguruan_tinggi' => 'University ' . $this->faker->company(),
            'telepon' => $this->faker->phoneNumber(),
            'faximile' => $this->faker->phoneNumber(),
            'email' => 'email@gmail.com',
            'website' => 'www.example.com',
            'jalan' => $this->faker->streetAddress(),
            'kelurahan' => '-',
            'kode_pos' => $this->faker->randomNumber(5, true),
            'id_wilayah' => $this->faker->randomNumber(5, true),
            'nama_wilayah' => $this->faker->city(),
            'lintang_bujur' => $this->faker->latitude($min = -90, $max = 90) . $this->faker->longitude($min = -180, $max = 180),
            'mbs' => $this->faker->randomNumber(1),
            'luas_tanah_milik' => $this->faker->randomNumber(1),
            'luas_tanah_bukan_milik' => $this->faker->randomNumber(1),
            'sk_pendirian' => '57 Tahun 2005',
            'id_status_milik' => $this->faker->randomNumber(1),
            'status_perguruan_tinggi' => 'A',
        ];
    }
}
