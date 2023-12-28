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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->text('desc');
            $table->string('lecture');
            $table->string('quiz');
            $table->string('duration');
            $table->string('language');
            $table->text('location');
            $table->integer('certificate');
            $table->foreignId('online_id')->nullable()->constrained();
            $table->foreignId('offline_id')->nullable()->constrained();
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
        Schema::dropIfExists('courses');
    }
};
