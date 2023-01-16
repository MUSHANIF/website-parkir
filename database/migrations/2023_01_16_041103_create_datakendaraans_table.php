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
        Schema::create('datakendaraans', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('userid');              
            $table->unsignedBigInteger('id_kategori');              
            $table->string('no_pol');  
            $table->timestamp('jam_masuk');   
            $table->datetime('jam_keluar');   
            $table->enum('status', ['member', 'tidak member']);
            $table->timestamps();            
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datakendaraans');
    }
};
