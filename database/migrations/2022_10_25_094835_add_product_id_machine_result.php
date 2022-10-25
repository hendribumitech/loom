<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductIdMachineResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::table('machine_results', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('uom_id','fk_machine_results_1')->references('id')->on('uoms')->delete('cascade')->update('cascade');
            $table->foreign('machine_id','fk_machine_results_2')->references('id')->on('machines')->delete('cascade')->update('cascade');
            $table->foreign('shiftment_id','fk_machine_results_3')->references('id')->on('shiftments')->delete('cascade')->update('cascade');            
            $table->foreign('product_id','fk_machine_results_4')->references('id')->on('products')->delete('cascade')->update('cascade');
            $table->unique(['machine_id', 'shiftment_id', 'work_date', 'product_id'], 'uq_machine_results_11');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('machine_results', function (Blueprint $table) {            
            $table->dropForeign('fk_machine_results_4');
            $table->dropForeign('fk_machine_results_3');
            $table->dropForeign('fk_machine_results_2');
            $table->dropForeign('fk_machine_results_1');
            $table->dropColumn('product_id');
            $table->dropUnique('uq_machine_results_11');
        });
    }
}
