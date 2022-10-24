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
            $table->unique(['machine_id', 'shiftment_id', 'work_date'], 'uq_machine_productivity_11');
        });
        Schema::table('machine_results', function(Blueprint $table){
            $table->unique(['machine_id', 'shiftment_id', 'work_date'], 'uq_machine_results_11');
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
            $table->dropUnique('uq_machine_productivity_11');
        });
        Schema::table('machine_results', function(Blueprint $table){
            $table->dropUnique('uq_machine_results_11');
        });
    }
}
