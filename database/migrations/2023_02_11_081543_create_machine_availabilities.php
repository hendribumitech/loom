<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineAvailabilities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_availabilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('machine_id');
            $table->unsignedBigInteger('shiftment_id');
            $table->date('work_date');                        
            $table->decimal('duration_target', 8, 2, true)->comment('standart duration machine work');
            $table->decimal('duration_off', 8, 2, true)->nullable()->default(0.0);            
            $table->unsignedBigInteger('uom_id');
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('machine_id','fk_machine_availabilities_1')->references('id')->on('machines')->delete('cascade')->update('cascade');
            $table->foreign('shiftment_id','fk_machine_availabilities_2')->references('id')->on('shiftments')->delete('cascade')->update('cascade');
            $table->foreign('uom_id','fk_machine_availabilities_3')->references('id')->on('uoms')->delete('cascade')->update('cascade');
            $table->unique(['machine_id', 'shiftment_id', 'work_date'], 'uq_machine_availabilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_availabilities');
    }
}
