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
        Schema::create('filiere_module', function (Blueprint $table) {
            $table->id();
            $table->integer('filiere_id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->timestamps();
            $table->foreign('filiere_id')->references('id')->on('filiere')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('module_id')->references('id')->on('module')->onDelete('restrict')->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filiere_module', function (Blueprint $table) {
            $table->dropForeign('filiere_module_filiere_id_foreign');
            $table->dropForeign('filiere_module_module_id_foreign');
        });
        Schema::dropIfExists('filiere_module');
    }
};