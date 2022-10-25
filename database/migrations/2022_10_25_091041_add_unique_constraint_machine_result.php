<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueConstraintMachineResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('machine_productivity', function(Blueprint $table){
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('uom_id','fk_machine_productivity_1')->references('id')->on('uoms')->delete('cascade')->update('cascade');
            $table->foreign('machine_id','fk_machine_productivity_2')->references('id')->on('machines')->delete('cascade')->update('cascade');
            $table->foreign('shiftment_id','fk_machine_productivity_3')->references('id')->on('shiftments')->delete('cascade')->update('cascade');
            $table->foreign('capacity_uom_id','fk_machine_productivity_4')->references('id')->on('uoms')->delete('cascade')->update('cascade');
            $table->foreign('product_id','fk_machine_productivity_5')->references('id')->on('products')->delete('cascade')->update('cascade');
            $table->unique(['machine_id', 'shiftment_id', 'work_date', 'product_id'], 'uq_machine_productivity_11');
        });        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('machine_productivity', function(Blueprint $table){
            $table->dropForeign('fk_machine_productivity_1');
            $table->dropForeign('fk_machine_productivity_2');
            $table->dropForeign('fk_machine_productivity_3');
            $table->dropForeign('fk_machine_productivity_4');
            $table->dropForeign('fk_machine_productivity_5');            
            $table->dropUnique('uq_machine_productivity_11');
        });
        
    }
}
