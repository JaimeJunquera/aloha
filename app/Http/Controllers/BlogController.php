<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Repository\BlogRepository;

class BlogController extends Controller {

    private $blogRepo;


    public function __CONSTRUCT(BlogRepository $blogRepo){
        $this->middleware('auth');

        $this->blogRepo = $blogRepo;
    }

    public function getIndex(){
        return view('blog/index', [
            'model' => $this->blogRepo->listar()
        ]);
    }

    public function getCrud($id = 0){
        return view('blog/crud', [
            'model' => ($id > 0 ? $this->blogRepo->obtener($id) : null)
        ]);
    }
    public function postCrud(Request $request) {

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

}
