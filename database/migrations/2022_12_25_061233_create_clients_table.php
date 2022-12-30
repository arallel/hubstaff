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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id');
            $table->string('client_name');
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email_client')->nullable();
            $table->string('project_id')->nullable();
            $table->string('budget')->nullable();
            $table->enum('budget_type',['total_cost','total_hours'])->nullable();
            $table->enum('budget_based',['bill_rate','pay_rate'])->nullable();
            $table->string('notify_at')->nullable();
            $table->enum('status',['0','1'])->default(0);
            $table->enum('auto-invoice',['0','1'])->nullable();
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
        Schema::dropIfExists('clients');
    }
};
