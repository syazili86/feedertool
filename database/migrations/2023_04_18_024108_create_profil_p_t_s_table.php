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
            $table->id();
            $table->uuid("id_perguruan_tinggi");
            $table->string("kode_perguruan_tinggi");
            $table->string("nama_perguruan_tinggi");
            $table->integer("id_wilayah");
            $table->string("token");


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
