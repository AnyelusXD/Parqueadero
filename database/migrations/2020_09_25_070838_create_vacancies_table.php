<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->timestamp('entry_time');
            $table->timestamp('exit_time')->nullable();
            $table->decimal('price_total', '12','2')->nullable();

            $table->foreignId('parking_id')->constrained()->on('parkings')->onDelete('cascade');
            $table->foreignId('client_id')->constrained()->on('clients')->onDelete('cascade');
            $table->foreignId('bahia_id')->constrained()->on('bahias')->onDelete('cascade');
           

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
        Schema::dropIfExists('vacancies');
    }
}
