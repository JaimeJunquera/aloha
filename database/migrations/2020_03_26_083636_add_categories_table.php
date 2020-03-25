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
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->text('descripcion');
            $table->timestamps();
        });

        //Alteramos y agregamos relacion con la tabla blog
        Schema::table('blog',function ($table){
            //Creacion del campo
            $table->integer('category_id')->unsigned()->nullable();

            //Agrega una relacion
            $table->foreign('category_id')
                  ->references('id')
                  ->on('category');
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');

        Schema::table('blog',function ($table){
            $table->dropForeign(['user_id']);
        });

    }
}
