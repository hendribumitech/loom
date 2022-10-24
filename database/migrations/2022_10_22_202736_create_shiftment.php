<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shiftments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 10)->unique();
            $table->string('name', 50);
            $table->time('start_hour');
            $table->time('end_hour');
            $table->tinyInteger('overday', false, true)->nullable()->default(0);
            $table->softDeletes();            
            $table->timestamps(); 
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shiftments');
    }
}
