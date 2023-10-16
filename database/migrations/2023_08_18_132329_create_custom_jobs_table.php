<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('istanimi')->default('a');
            $table->string('müsteriadi');
            $table->integer('islemyuzdesi');
            $table->string('aciklama');
            $table->integer('servisucreti');
            $table->dateTime('bastarih');
            $table->dateTime('bittarih')->useCurrent();
            $table->boolean('durum')->startingValue(false);
            $table->integer('kullaniciid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_jobs');
    }
};
