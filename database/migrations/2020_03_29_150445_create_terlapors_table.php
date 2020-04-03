<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerlaporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terlapors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pelapor_id');
            $table->string('nama_t')->nullable();
            $table->enum('jk_t', ['Pria', 'Wanita']);
            $table->integer('usia_t')->nullable();
            $table->enum('agama_t', ['Islam', 'Kristen Katolik', 'Kristen Protestan', 'Hindu', 'Budha', 'Konghucu', 'Bahai', 'Kepercayaan Lainnya'])->nullable();
            $table->string('kontak_t')->nullable();
            $table->string('kewarganegaraan_t')->nullable();
            $table->text('alamat_t')->nullable();
            $table->timestamps();
            
            $table->foreign('pelapor_id')->references('id')->on('pelapors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terlapors');
    }
}
