<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSshLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssh_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agent_id');
            $table->string('ip')->nullable();
            $table->string('user')->nullable();
            $table->timestamp("date");
            $table->string("timezone");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ssh_logs');
    }
}
