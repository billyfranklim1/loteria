<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrawingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drawings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->date('date_start');
            $table->date('date_end');
            $table->enum('status', ['pending', 'active', 'finished'])->default('pending');
            $table->integer('n1')->nullable();
            $table->integer('n2')->nullable();
            $table->integer('n3')->nullable();
            $table->integer('n4')->nullable();
            $table->integer('n5')->nullable();
            $table->integer('n6')->nullable();
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
        Schema::dropIfExists('drawings');
    }
}
