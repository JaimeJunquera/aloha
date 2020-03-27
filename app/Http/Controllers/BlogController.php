<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


use App\Repository\CategoriaRepository;
use App\Repository\DocumentoRepository;
use App\Repository\BlogRepository;

class BlogController extends Controller {

    private $blogRepo;
    private $catRepo;
    private $docRepo;


    public function __CONSTRUCT(BlogRepository $blogRepo, CategoriaRepository $catRepo,DocumentoRepository $docRepo){
        $this->middleware('auth');

        $this->blogRepo = $blogRepo;
        $this->catRepo = $catRepo;
        $this->docRepo = $docRepo;
    }

    public function getIndex(){
        return view('blog/index', [
            'model' => $this->blogRepo->listar()
        ]);
    }

    public function getCrud($id = 0){
        return view('blog/crud', [
            'model' => ($id > 0 ? $this->blogRepo->obtener($id) : null),
            'categorias' => $this->catRepo->listar()
        ]);
    }
    public function postCrud(Request $request) {
//        $mensaje = [
//          'titulo.required' => 'El :attribute debe ser ingresado',
//          'titulo.max' => 'El valor ingresado para :attribute es demasiado largo',
//        ];
        $this->validate($request, [
            'categoria_id' => 'required|numeric',
            'titulo' => 'required|max:70',
            'descripcion' => 'required|max:100',
            'habilitado' => 'required|numeric'
        ]);// Pueden pasar al variable $mensaje para personalizar las reglas mostrando un mensaje personalziado

        $this->blogRepo->guardar( $request );
        return redirect( 'home/blog' );
    }

    public function getVer( $id ){
        return view('blog/ver', [
            'model' => $this->blogRepo->obtener($id)
        ]);
    }

    public function getEliminar($id){

        $this->blogRepo->eliminar( $id );
        return redirect( 'home/blog' );
    }

    public function postAdjuntar(Request $request)
    {
        //Probando lo que me devuelve el request
        dd ($request->file());

        //$this->docRepo->guardar($request);
    }

}
