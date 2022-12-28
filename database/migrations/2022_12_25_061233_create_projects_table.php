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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('project_name');
            $table->string('budget')->nullable();
            $table->enum('budget_type',['total_cost','total_hours'])->nullable();
            $table->enum('budget_based',['bill_rate','pay_rate'])->nullable();
            $table->string('project_status')->nullable();
            $table->date('start')->nullable();
            $table->string('notify_at')->nullable();
            $table->string('todos_id')->nullable();
            $table->string('teams')->nullable();
            $table->string('manager')->nullable();
            $table->string('user_id')->nullable();
            $table->string('viewer')->nullable();
            $table->string('client_id');
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
        Schema::dropIfExists('projects');
    }
};
