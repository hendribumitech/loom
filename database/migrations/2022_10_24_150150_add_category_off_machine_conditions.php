<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryOffMachineConditions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::table('machine_conditions', function(Blueprint $table){
            $table->unsignedBigInteger('category_off_id')->nullable();
            $table->foreign('category_off_id', 'fk_machine_conditions_5')->on('category_offs')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('machine_conditions', function(Blueprint $table){            
            $table->dropForeign('fk_machine_conditions_5');
            $table->dropColumn('category_off_id');
        });
    }
}
