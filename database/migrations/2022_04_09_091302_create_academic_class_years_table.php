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
        Schema::create('academic_class_years', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_class_id')
                ->references('id')
                ->on('academic_classes')
                ->onUpdate('cascade')
                ->onUpdate('cascade');
            $table->foreignId('academic_year_id')
                ->references('id')
                ->on('academic_years')
                ->onUpdate('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_class_years');
    }
};
