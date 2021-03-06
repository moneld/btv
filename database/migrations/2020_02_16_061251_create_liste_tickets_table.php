<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liste_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->text('emplacement');
            $table->text('lieu_depot');
            $table->date('date');
            $table->string('type');
            $table->string('affecter')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->integer('statut')->default('0');
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
        Schema::dropIfExists('liste_tickets');
    }
}
