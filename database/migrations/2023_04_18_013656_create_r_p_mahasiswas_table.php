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
        Schema::create('r_p_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->uuid("id_mahasiswa")->unique();//: "2eb82166-41c7-469a-a276-cdb9d3601458",
            $table->string("nim");//: "22142033P",
            $table->integer("id_jenis_daftar");//: "2",
            $table->integer("id_jalur_daftar");//: "12",
            $table->string("id_periode_masuk");//: "20221",
            $table->date("tanggal_daftar");// "26-02-2023",
            $table->uuid("id_perguruan_tinggi");//: "721cb877-584a-4888-a0ea-c28310cc4c3d",
            $table->uuid("id_prodi");//: "1a96b21b-372e-413a-b2f9-cc4f8a0a6979",
            $table->uuid("id_bidang_minat")->nullable();//: null,
            $table->integer("sks_diakui")->nullable();//: "10",
            $table->uuid("id_perguruan_tinggi_asal");//: "4a803373-c521-4f44-88d0-be28ada9e67a",
            $table->uuid("id_prodi_asal");//: "c9091879-6fd9-4691-bea8-283186c27ad1",
            $table->integer("id_pembiayaan");//: "1",
            $table->integer("biaya_masuk")->unsigned();// 6400000
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
        Schema::dropIfExists('r_p_mahasiswas');
    }
};
