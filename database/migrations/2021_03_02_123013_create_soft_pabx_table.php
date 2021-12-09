<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftPabxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soft_pabx', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('employee_name');
            $table->string('employee_type');
            $table->string('username');
            $table->string('pabx_number');
            $table->string('secret_key');
            $table->string('host');
            $table->string('status');
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
        Schema::dropIfExists('soft_pabx');
    }
}
