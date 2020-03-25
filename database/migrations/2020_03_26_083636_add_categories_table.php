<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriesTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->text('descripcion');
            $table->timestamps();
        });

        //Alteramos y agregamos relacion con la tabla blog
        Schema::table('blog',function ($table){
            //Creacion del campo
            $table->integer('categoria_id')->unsigned()->nullable();

            //Agrega una relacion
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categoria');
        });
    }

    /**
     * @return void
     */
    public function down()
    {

        Schema::table('blog',function ($table){
            $table->dropForeign(['categoria_id']);
            $table->dropColumn('categoria_id');
        });

        Schema::dropIfExists('categoria');

    }
}
