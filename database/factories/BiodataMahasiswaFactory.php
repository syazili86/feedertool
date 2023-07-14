<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BiodataMahasiswa>
 */
class BiodataMahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "id_mahasiswa" => $this->faker->uuid(),
            "nama_mahasiswa" => $this->faker->name(),
            "nim" => $this->faker->bothify('18#########'),
            "idnumber" => $this->faker->randomNumber(7, false),
            "jenis_kelamin" => $this->faker->randomElement(['L', 'P']),
            "tempat_lahir" => $this->faker->city(),
            "tanggal_lahir" => $this->faker->date(),
            "id_agama" => 1,
            "nik" => $this->faker->bothify('16##############'),
            "nisn" => $this->faker->bothify('##########'),
            "kewarganegaraan" => 'ID',
            "jalan" => $this->faker->streetAddress(),
            "dusun" => $this->faker->cityPrefix(),
            "rt" => $this->faker->numberBetween(1, 99),
            "rw" => $this->faker->numberBetween(1, 99),
            "kelurahan" => $this->faker->cityPrefix(),
            "kode_pos" => $this->faker->bothify('#####'),
            "id_wilayah" => "116000",
            "id_jenis_tinggal" => 99,
            "id_alat_transportasi" => 5,
            "telepon" => $this->faker->bothify('08##########'),
            "handphone" => $this->faker->bothify('08##########'),
            "email" => $this->faker->freeEmail(),
            "penerima_kps" => $this->faker->randomElement([0, 1]),
            "nomor_kps" => $this->faker->bothify('#############'),
            "nik_ayah" => $this->faker->bothify('16##############'),
            "nama_ayah" => $this->faker->name(),
            "tanggal_lahir" => $this->faker->date(),
            "id_pendidikan_ayah" => 6,
            "id_pekerjaan_ayah" => 5,
            "id_penghasilan_ayah" => 14,
            "nik_ibu" => $this->faker->bothify('16##############'),
            "nama_ibu_kandung" => $this->faker->name(),
            "tanggal_lahir_ibu" => $this->faker->date(),
            "id_pendidikan_ibu" => 9,
            "id_pekerjaan_ibu" => 5,
            "id_penghasilan_ibu" => 3,
            "npwp" => $this->faker->bothify('16############'),
            "nama_wali" => $this->faker->name(),
            "tanggal_lahir_wali" => $this->faker->date(),
            "id_pendidikan_wali" => 5,
            "id_pekerjaan_wali" => 9,
            "id_penghasilan_wali" => 2,
            "id_kebutuhan_khusus_mahasiswa" => 5,
            "id_kebutuhan_khusus_ayah" => 4,
            "nama_kebutuhan_khusus_ayah" => $this->faker->lexify('?????'),
            "id_kebutuhan_khusus_ibu" => 7,
        ];
    }
}
