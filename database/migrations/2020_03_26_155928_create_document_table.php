<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('archivo',100);
            //Relacion
            $table->integer('publicacion_id')
                  ->unsigned();
            $table->timestamps();
        });

        Schema::table('documento',function ($table){
            $table->foreign('publicacion_id')
                ->references('id')
                ->on('blog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documento',function ($table){
            $table->dropForeign(['publicacion_id']);
            $table->dropColumn('publicacion_id');
        });

        Schema::dropIfExists('documento');
    }
}
