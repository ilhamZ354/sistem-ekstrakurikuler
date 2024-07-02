<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onupdate('cascade')->ondelete('cascade');
            $table->string('bulan');
            $table->integer('pertemuan');
            $table->foreignId('kegiatan_id')->constrained()->onupdate('cascade')->ondelete('cascade');
            $table->boolean('isHadir')->default(0);
            $table->integer('nilai')->nullable();
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
        Schema::dropIfExists('laporans');
    }
}
