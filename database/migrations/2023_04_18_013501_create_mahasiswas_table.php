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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string("nama_mahasiswa");
            $table->string("jenis_kelamin"); //: "L",
            $table->string("tempat_lahir");//: "PALEMBANG",
            $table->date("tanggal_lahir");//: "1999/04/03",
            $table->integer("id_agama");//: 1,
            $table->string("nik"); //: "1671100404990003",
            $table->string("nisn");//: "9968331409",
            $table->string("kewarganegaraan");// "ID",
            $table->string("jalan")->nullable();// "ID",
            $table->string("dusun")->nullable();// "ID",
            $table->string("rt")->nullable();// "rt",
            $table->string("rw")->nullable();// "",
            $table->string("kelurahan"); //: "KALIDONI",
            $table->string("kode_pos")->nullable(); //: "KALIDONI",
            $table->string("id_wilayah");//: "999999",
            $table->integer("penerima_kps");//: "0: Bukan penerima KPS, 1: Penerima KPS",
            $table->string("nama_ibu_kandung");//: "HUSIAH"
            $table->integer("id_kebutuhan_khusus_mahasiswa")->default(0);
            $table->integer("id_kebutuhan_khusus_ayah")->default(0);
            $table->integer("id_kebutuhan_khusus_ibu")->default(0);
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
        Schema::dropIfExists('mahasiswas');
    }
};
