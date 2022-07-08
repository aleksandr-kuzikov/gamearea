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
        Schema::table('animals', function (Blueprint $table) {
            $table->unique('name');
            $table->integer('age')->change();
            $table->double('size', 5, 2)->change();
        });

        
        Schema::table('kinds', function (Blueprint $table) {
            $table->unique('kind');
            $table->double('max_size', 5, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropUnique('name');
        });

        
        Schema::table('kinds', function (Blueprint $table) {
            $table->dropUnique('kind');
        });
    }
};
