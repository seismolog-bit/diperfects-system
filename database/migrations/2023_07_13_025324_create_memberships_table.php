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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('nama');
            $table->string('image_url');
            $table->string('nomor_hp');
            $table->string('alamat');
            $table->integer('kelurahan_id');
            $table->integer('kecamatan_id');
            $table->integer('kabupaten_id');
            $table->integer('provinsi_id');
            $table->integer('membership_type_id');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('memberships');
    }
};
