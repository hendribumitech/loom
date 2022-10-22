<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUoms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uoms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 10);
            $table->string('name', 50);
            $table->string('category', 15)->comment('tipe uom, misalkan berat, luas, satuan dll');
            $table->enum('types', ['reference', 'smaller', 'bigger']);
            $table->decimal('ratio', 15, 6, true);
            $table->softDeletes();            
            $table->timestamps();
            $table->unique('code','category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uoms');
    }
}
