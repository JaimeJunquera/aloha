<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repository\CategoriaRepository;
use Illuminate\Http\Request;
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
        //dd($request);
        //hay que validar

        $this->docRepo->guardar($request);

        //Este return no venia en el blog, al adjuntar se sigue quedando en la pagina y se sube el archivo,
        //Pero por cuestion de este laravel o se me pasa algo se reedirige a la página y yo sólo quiero
        //capturar el post y mostrar el listado de documentos
        return redirect()->back();
    }

    public function getDocumentos($blog_id){
        return $this->docRepo->listar($blog_id);
    }

}
