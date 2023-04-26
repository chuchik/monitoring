<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApacheLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apache_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("agent_id");
            $table->timestamp("date");
            $table->string("timezone");
            $table->json('details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apache_logs');
    }
}
