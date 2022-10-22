<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('machine_id');
            $table->decimal('amount', 15, 2, true);
            $table->unsignedBigInteger('uom_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('uom_id','fk_machine_results_1')->references('id')->on('uoms')->delete('cascade')->update('cascade');
            $table->foreign('machine_id','fk_machine_results_2')->references('id')->on('machines')->delete('cascade')->update('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_results');
    }
}
