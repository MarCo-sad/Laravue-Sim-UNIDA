<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooperations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fakultas_id');
            $table->integer('lembaga_id');
            $table->integer('jeniskerjasama_id');
            $table->integer('benua_id');
            $table->integer('negara_id');
            $table->integer('kota_id');
            $table->integer('bidang_id');
            $table->date('tgl_mulai');
            $table->date('tgl_berakhir');
            $table->string('documents');    
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
        Schema::dropIfExists('cooperations');
    }
}
