<?php

namespace App\Repository;

use App\Documento;

class DocumentoRepository
{
    public function listar($blog_id){
        return Documento::where('blog_id', $blog_id)->get();
    }


    public function guardar($data){
        $documento = new Documento();

        $blog->titulo = $data['nombre'];
        $blog->archivo = $data['archivo'];
        $blog->blog_id = $data['blog_id'];


        $blog->save();
    }

    public function eliminar($id){
        return Documento::destroy($id);
    }
}

