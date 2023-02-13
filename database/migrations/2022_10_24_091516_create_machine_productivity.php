<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineProductivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('machine_productivity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('machine_id');
            $table->unsignedBigInteger('shiftment_id');
            $table->date('work_date');
            $table->decimal('capacity', 15, 2, true);
            $table->unsignedBigInteger('capacity_uom_id');
            $table->decimal('duration_target', 8, 2, true)->comment('standart duration machine work');
            $table->decimal('duration_off', 8, 2, true)->nullable()->default(0.0);
            $table->decimal('amount_target', 15, 2, true);
            $table->decimal('amount_result', 15, 2, true);
            $table->unsignedBigInteger('uom_id');
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
        Schema::dropIfExists('machine_productivity');
    }
}
