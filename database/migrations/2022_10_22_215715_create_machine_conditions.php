<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineConditions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('machine_id');
            $table->unsignedBigInteger('shiftment_id');
            $table->date('work_date');
            $table->datetime('start');
            $table->datetime('end');
            $table->decimal('amount_minutes', 12, 2, true);
            $table->string('description', 200)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('machine_id','fk_machine_conditions_1')->references('id')->on('machines')->delete('cascade')->update('cascade');
            $table->foreign('shiftment_id','fk_machine_conditions_2')->references('id')->on('shiftments')->delete('cascade')->update('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_conditions');
    }
}
