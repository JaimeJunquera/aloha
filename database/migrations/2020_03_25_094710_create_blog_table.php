<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  CreateBlogTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',100);
            $table->string('descripcion',200);
            $table->text('contenido');
            $table->tinyInteger('habilitado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog');
    }
}
