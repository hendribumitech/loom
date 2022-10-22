<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {           
        Schema::create('machines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 10);
            $table->string('name', 50);
            $table->decimal('capacity', 15, 2, true);
            $table->unsignedBigInteger('capacity_uom_id');
            $table->unsignedBigInteger('period_uom_id')->comment('dalam satuan jam, hari atau lainnya');
            $table->string('description', 100)->nullable();
            $table->string('types', 15)->comment('tipe uom, misalkan berat, luas, satuan dll');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('capacity_uom_id','fk_machines_1')->references('id')->on('uoms')->delete('cascade')->update('cascade');
            $table->foreign('period_uom_id','fk_machines_2')->references('id')->on('uoms')->delete('cascade')->update('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
