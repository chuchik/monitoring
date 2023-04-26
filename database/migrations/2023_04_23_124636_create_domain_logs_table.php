<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agent_id');
            $table->integer('site_id');
            $table->integer('status');
            $table->integer('p80')->nullable();
            $table->integer('p443')->nullable();
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
        Schema::dropIfExists('domain_logs');
    }
}
