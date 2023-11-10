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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('nama');
            $table->string('image_url');
            $table->longText('deskripsi');
            $table->decimal('harga', 16,0)->default(0);
            $table->integer('stok')->default(0);
            $table->integer('kategori_id');
            $table->string('bpom')->nullable();
            //ukuran
            $table->decimal('berat', 16,0)->default(0);
            $table->decimal('panjang', 16,0)->default(0);
            $table->decimal('lebar', 16,0)->default(0);
            $table->decimal('tinggi', 16,0)->default(0);
            //diskon
            $table->integer('diskon_percent')->default(0);
            $table->decimal('diskon_rupiah', 16,0)->default(0);
            $table->integer('diskon_tipe')->default(0);
            $table->boolean('status')->default(1);
            //komisi
            $table->boolean('komisi')->default(0);

            //views
            $table->bigIncrements('views')->default(0);
            $table->boolean('feature')->default(false);
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
        Schema::dropIfExists('products');
    }
};
