<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRamLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ram_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agent_id');
            $table->float('summary');
            $table->float('used');
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
        Schema::dropIfExists('ram_logs');
    }
}
