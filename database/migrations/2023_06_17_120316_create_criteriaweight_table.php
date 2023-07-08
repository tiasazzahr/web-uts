<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteriaweight', function (Blueprint $table) {
            $table->id();
            $table->string('kalori', 100);
            $table->string('protein', 100);
            $table->string('karbohidrat', 100);
            $table->string('lemak', 100);
            $table->string('gizi', 100);
            $table->enum('type', ['benefit','cost']);
            $table->float('weight');
            $table->string('description', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criteriaweight');
    }
};
