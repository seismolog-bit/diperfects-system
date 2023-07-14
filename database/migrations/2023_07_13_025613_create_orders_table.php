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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->date('tanggal_order');
            $table->integer('membership_id')->default(1);
            $table->integer('qty');
            $table->decimal('total', 16, 0);
            $table->decimal('diskon', 16, 0)->default(0);
            $table->decimal('ongkir', 16, 0)->default(0);
            $table->decimal('grand_total', 16, 0);
            $table->text('note')->nullable();
            $table->text('cancelled_note')->nullable();
            $table->decimal('payment_cash', 16,0)->default(0);
            $table->decimal('payment_transfer', 16,0)->default(0);
            $table->integer('status')->default(0); //0 aktif, 1 selesai, 2 batal
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
        Schema::dropIfExists('orders');
    }
};
