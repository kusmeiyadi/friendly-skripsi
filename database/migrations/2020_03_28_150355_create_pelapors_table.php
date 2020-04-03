<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelaporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelapors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_p');
            $table->string('identitas_p')->nullable();
            $table->enum('jk_p', ['Pria', 'Wanita']);
            $table->enum('agama_p', ['Islam', 'Kristen Katolik', 'Kristen Protestan', 'Hindu', 'Budha', 'Konghucu', 'Bahai', 'Kepercayaan Lainnya']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('kewarganegaraan_p');
            $table->string('kontak_p');
            $table->text('alamat_p');
            $table->string('relasi_p');
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
        Schema::dropIfExists('pelapors');
    }
}
