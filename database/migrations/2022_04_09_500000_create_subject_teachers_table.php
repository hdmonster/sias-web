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
        Schema::create('subject_teachers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('subject_id')
                ->references('id')
                ->on('subjects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            $table->foreignId('academic_class_year_id')
                ->references('id')
                ->on('academic_class_years')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_teachers');
    }
};
