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
        Schema::create('class_home_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onUpdate('cascade')
                ->onUpdate('cascade');
            $table->foreignId('academic_class_year_id')
                ->references('id')
                ->on('academic_class_years')
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
        Schema::dropIfExists('class_home_teachers');
    }
};
