<?php

namespace App\Repository;

use App\Documento;

class DocumentoRepository
{
    public function listar($blog_id) {
        return Documento::where('blog_id', $blog_id)->get();
    }

    public function guardar($data) {


        $originalName = $data->file('archivo')
                              ->getClientOriginalName();

        $originalName = date('Y-m-d-h:m:s-') . strtolower(str_replace('-', '', $originalName));

        $data->file('archivo')->move('uploads', $originalName);

        $documento = new Documento();

        $documento->nombre = $data['nombre'];
        $documento->archivo = $data['archivo'];
        $documento->blog_id = $data['blog_id'];
        $documento->archivo = $originalName;

        $documento->save();
    }

    public function eliminar($id) {

        Documento::destroy($id);
    }
}
