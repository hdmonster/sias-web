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
        Schema::create('academic_scores', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('subject_id')
            ->references('id')
            ->on('subjects')
            ->onUpdate('cascade')
            ->onUpdate('cascade');
            
            $table->foreignId('student_id')
            ->references('id')
            ->on('students')
            ->onUpdate('cascade')
            ->onUpdate('cascade');
            
            $table->foreignId('academic_class_year_id')
            ->references('id')
            ->on('academic_class_years')
            ->onUpdate('cascade')
            ->onUpdate('cascade');
            
            $table->integer('score');
            $table->enum(
                'score_type', 
                ['homework','daily test','quiz','mid term','final term']
            );
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_scores');
    }
};
