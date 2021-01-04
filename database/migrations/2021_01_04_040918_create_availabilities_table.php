<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->boolean('monday_am')->default(true);
            $table->boolean('monday_pm')->default(true);

            $table->boolean('tuesday_am')->default(true);
            $table->boolean('tuesday_pm')->default(true);

            $table->boolean('wednesday_am')->default(true);
            $table->boolean('wednesday_pm')->default(true);

            $table->boolean('thursday_am')->default(true);
            $table->boolean('thursday_pm')->default(true);

            $table->boolean('friday_am')->default(true);
            $table->boolean('friday_pm')->default(true);

            $table->boolean('saturday_am')->default(true);
            $table->boolean('saturday_pm')->default(true);

            $table->boolean('sunday_am')->default(true);
            $table->boolean('sunday_pm')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('availabilities');
    }
}
