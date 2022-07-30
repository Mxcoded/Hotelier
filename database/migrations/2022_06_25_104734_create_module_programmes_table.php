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
        Schema::create('module_programmes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("module_id");
            $table->foreignId("programme_id");
            $table->enum("journee", ["matin", "soir"]);
            $table->time("heure")->default('08:00:00');
            $table->date("jour");
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
        Schema::dropIfExists('module_programmes');
    }
};