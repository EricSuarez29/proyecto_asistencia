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
        Schema::create('partials', function (Blueprint $table) {
            $table->id();
            $table->date('start_first_partial');
            $table->date('end_first_partial');
            $table->date('start_second_partial');
            $table->date('end_second_partial');
            $table->date('start_third_partial');
            $table->date('end_third_partial');
            $table->integer('period_id')->references('id')->on('periods');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partials');
    }
};
