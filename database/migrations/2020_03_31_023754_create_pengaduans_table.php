<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('kode')->nullable();
          $table->string('provinsi')->nullable();
          $table->string('kabupaten')->nullable();
          $table->unsignedBigInteger('jenis_kasus_id');
          $table->unsignedBigInteger('pelapor_id');
          $table->integer('user_id');
          $table->string('title');
          $table->string('slug');
          $table->string('pasal')->nullable();
          $table->text('kronologi');
          $table->boolean('is_approved')->default(false);
          $table->string('file')->nullable();
          $table->string('audio')->nullable();
          $table->timestamps();

          $table->foreign('jenis_kasus_id')->references('id')->on('jenis_kasuses');
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
        Schema::dropIfExists('pengaduans');
    }
}
