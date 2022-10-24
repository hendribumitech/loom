<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineCapacities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_capacities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('machine_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('capacity', 15, 2, true);
            $table->unsignedBigInteger('capacity_uom_id');
            $table->unsignedBigInteger('period_uom_id')->comment('dalam satuan jam, hari atau lainnya');      
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('capacity_uom_id','fk_machine_capacities_1')->references('id')->on('uoms')->delete('cascade')->update('cascade');
            $table->foreign('period_uom_id','fk_machine_capacities_2')->references('id')->on('uoms')->delete('cascade')->update('cascade');
            $table->unique(['product_id', 'machine_id'], 'uq_machine_capacities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_capacities');
    }
}
