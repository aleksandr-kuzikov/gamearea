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
        Schema::dropIfExists('animals');
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kind_id');
            $table->string('name')->unique();
            $table->integer('age');
            $table->double('size', 5, 2);
            $table->timestamps();
        });

        Schema::dropIfExists('kinds');
        Schema::create('kinds', function (Blueprint $table) {
            $table->id();
            $table->string('kind')->unique();
            $table->double('max_size', 5, 2);
            $table->integer('max_age');
            $table->double('growth_factor', 5, 2);
            $table->string('icon');
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
        Schema::dropIfExists('animals');
        Schema::dropIfExists('kinds');
    }
};
