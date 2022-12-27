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
        Schema::create('invitationals', function (Blueprint $table) {
            $table->id('invit_id');
            $table->string('email');
            $table->string('token');
            $table->string('payrate')->nullable();
            $table->enum('role',['manager','project_manager','user','project_viewer','owner']);
            $table->string('company');
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
        Schema::dropIfExists('invitationals');
    }
};
