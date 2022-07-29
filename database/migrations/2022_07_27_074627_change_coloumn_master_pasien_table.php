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
        Schema::table('master_pasiens', function (Blueprint $table) {
            $table->string('no_rm')->unsigned()->change();
        });
        Schema::table('homecare_admins', function (Blueprint $table) {
            $table->text('kondisi_pasien')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_pasiens', function (Blueprint $table) {
            $table->string('no_rm')->change();
        });
        Schema::table('homecare_admins', function (Blueprint $table) {
            $table->string('kondisi_pasien')->nullable()->change();
        });
    }
};
