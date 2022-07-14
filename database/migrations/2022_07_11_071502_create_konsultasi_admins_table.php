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
        Schema::create('konsultasi_admins', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('name', 30);
            $table->string('pekerjaan', 30)->nullable();
            $table->string('email')->nullable();
            $table->text('keluhan');
            $table->text('balas')->nullable();
            $table->boolean('status_pasien')->nullable();
            $table->boolean('status_admin')->nullable();
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
        Schema::dropIfExists('konsultasi_admins');
    }
};
