<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_mahasiswas', function (Blueprint $table) {
            $table->uuid("id_mahasiswa")->primary();
            $table->string("nama_mahasiswa", 100);
            $table->char("jenis_kelamin", 1);
            $table->string("tempat_lahir", 32);
            $table->date("tanggal_lahir");
            $table->integer('id_agama');
            $table->char('nik', 16);
            $table->char('nisn', 10)->nullable();
            $table->char('kewarganegaraan', 2);
            $table->string('jalan', 80)->nullable();
            $table->string('dusun', 80)->nullable();
            $table->decimal('rt', 2, 0)->nullable();
            $table->decimal('rw', 2, 0)->nullable();
            $table->string('kelurahan');
            $table->decimal('kode_pos', 5, 0)->nullable();
            $table->char('id_wilayah', 8);
            $table->decimal('id_jenis_tinggal', 2, 0)->nullable();
            $table->decimal('id_alat_transportasi', 2, 0)->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('handphone', 20)->nullable();
            $table->string('email', 60)->nullable();
            $table->decimal('penerima_kps', 1, 0);
            $table->string('nomor_kps', 80)->nullable();
            $table->char('nik_ayah', 16)->nullable();
            $table->string('nama_ayah', 100)->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->decimal('id_pendidikan_ayah', 2, 0)->nullable();
            $table->integer('id_pekerjaan_ayah')->nullable();
            $table->integer('id_penghasilan_ayah')->nullable();
            $table->char('nik_ibu', 16)->nullable();
            $table->string('nama_ibu_kandung', 100);
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->decimal('id_pendidikan_ibu', 2, 0)->nullable();
            $table->integer('id_pekerjaan_ibu')->nullable();
            $table->integer('id_penghasilan_ibu')->nullable();
            $table->char('npwp', 15);
            $table->string('nama_wali', 100)->nullable();
            $table->date('tanggal_lahir_wali')->nullable();
            $table->decimal('id_pendidikan_wali', 2, 0)->nullable();
            $table->integer('id_pekerjaan_wali')->nullable();
            $table->integer('id_penghasilan_wali')->nullable();
            $table->integer('id_kebutuhan_khusus_mahasiswa');
            $table->integer('id_kebutuhan_khusus_ayah');
            $table->string('nama_kebutuhan_khusus_ayah', 50)->nullable();
            $table->integer('id_kebutuhan_khusus_ibu');
            $table->boolean('sudah_sync')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata_mahasiswas');
    }
};
