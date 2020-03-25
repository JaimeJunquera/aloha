<?php

namespace App\Repository;

use App\Blog;

class BlogRepository
{
    public function listar(){
        return Blog::all();
    }

    public function obtener($id){
        return Blog::find($id);
    }

    public function guardar($data){
        $blog = new Blog();

        $blog->titulo = $data['titulo'];
        $blog->descripcion = $data['descripcion'];
        $blog->contenido = $data['contenido'];
        $blog->habilitado = $data['Habilitado'];

        $blog->save();
    }

    public function eliminar($id){

    }
}
