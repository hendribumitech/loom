<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintProductMachineCapacities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('machine_capacities', function (Blueprint $table) {
            $table->foreign('product_id','fk_machine_capacities_3')->references('id')->on('products')->delete('cascade')->update('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('machine_capacities', function (Blueprint $table) {
            $table->dropForeign('fk_machine_capacities_3');
        });
    }
}
