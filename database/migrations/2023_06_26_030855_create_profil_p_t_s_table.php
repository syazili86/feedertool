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
        Schema::create('profil_p_t_s', function (Blueprint $table) {
            $table->uuid('id_perguruan_tinggi');
            $table->string('kode_perguruan_tinggi', 8);
            $table->string('nama_perguruan_tinggi', 80);
            $table->string('telepon', 20);
            $table->string('faximile', 20);
            $table->string('email', 60);
            $table->string('Website', 256);
            $table->string('Jalan', 80);
            $table->string('Dusun', 60)->nullable();
            $table->string('rt_rw', 7)->nullable();
            $table->string('Kelurahan', 60);
            $table->integer('kode_pos');
            $table->foreignId('id_wilayah', 8);
            $table->string('nama_wilayah', 60);
            $table->string('lintang_bujur', 24);
            $table->string('Bank', 50)->nullable();
            $table->string('unit_cabang', 50)->nullable();
            $table->string('nomor_rekening', 60)->nullable();
            $table->integer('Mbs');
            $table->integer('luas_tanah_milik');
            $table->integer('luas_tanah_bukan_milik');
            $table->string('sk_pendirian', 80);
            $table->date('tanggal_sk_pendirian', 80)->nullable();
            $table->integer('id_status_milik');
            $table->string('nama_status_milik', 50)->nullable();
            $table->string('status_perguruan_tinggi', 1);
            $table->string('sk_izin_operasional', 80)->nullable();
            $table->date('tanggal_izin_operasional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_p_t_s');
    }
};
