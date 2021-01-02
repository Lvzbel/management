<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Work Week Number
            $table->integer('week_number');

            // Relation
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Week Days Start & End
            $table->date('start_monday')->nullable();
            $table->date('end_monday')->nullable();

            $table->date('start_tuesday')->nullable();
            $table->date('end_tuesday')->nullable();

            $table->date('start_wednesday')->nullable();
            $table->date('end_wednesday')->nullable();

            $table->date('start_thursday')->nullable();
            $table->date('end_thursday')->nullable();

            $table->date('start_friday')->nullable();
            $table->date('end_friday')->nullable();

            $table->date('start_saturday')->nullable();
            $table->date('end_saturday')->nullable();

            $table->date('start_sunday')->nullable();
            $table->date('end_sunday')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
