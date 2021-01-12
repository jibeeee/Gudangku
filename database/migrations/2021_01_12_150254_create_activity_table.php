<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->id();
            
            // $table->num('availableSpace',256);

            $table->integer('activity');
            $table->string('namaBarang',256);
            $table->integer('quantity');
            $table->integer('dimension');
            $table->string('id_supplier');
            $table->foreign('id_supplier')->references('id')->on('supplier');

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
        Schema::dropIfExists('activity');
    }
}
