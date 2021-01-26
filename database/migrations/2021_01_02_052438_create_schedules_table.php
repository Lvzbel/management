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

            // Relation
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->timestamp('week_start')->require();
            $table->timestamp('week_end')->require();

            // Week Days Start & End
            $table->timestamp('start_monday')->nullable();
            $table->timestamp('end_monday')->nullable();

            $table->timestamp('start_tuesday')->nullable();
            $table->timestamp('end_tuesday')->nullable();

            $table->timestamp('start_wednesday')->nullable();
            $table->timestamp('end_wednesday')->nullable();

            $table->timestamp('start_thursday')->nullable();
            $table->timestamp('end_thursday')->nullable();

            $table->timestamp('start_friday')->nullable();
            $table->timestamp('end_friday')->nullable();

            $table->timestamp('start_saturday')->nullable();
            $table->timestamp('end_saturday')->nullable();

            $table->timestamp('start_sunday')->nullable();
            $table->timestamp('end_sunday')->nullable();
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
