<?php
$habilitado = true;

if(is_object($model)){
    $habilitado = ($model->habilitado == 1);
}
?>

@extends('layouts.app')

@section('content')

    <h1 class="page-header">
        {{ is_object($model) ? $model->titulo : 'Nuevo registro' }}
    </h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div>
    <div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="information-tab" data-toggle="tab" href="#information" role="tab" aria-controls="home" aria-selected="true">Informacion</a>
            </li>
            @if(is_object($model))
                <li class="nav-item">
                    <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="profile" aria-selected="false">Documentos</a>
                </li>
            @endif
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                <form method="post" action="{{ url('home/blog/crud') }}">

                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ is_object($model) ? $model->id : '' }}"/>

                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control" name="categoria_id">
                            @foreach($categorias as $c) @if(is_object($model))
                                <option {{ $model->categoria_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->nombre }}</option>
                            @else
                                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                            @endif @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Titulo</label>
                        <input class="form-control" type="text" name="titulo" value="{{ is_object($model) ? $model->titulo : '' }}" />
                    </div>

                    <div class="form-group">
                        <label>Descripcion</label>
                        <textarea class="form-control" name="descripcion">{{ is_object($model) ? $model->descripcion : '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Contenido</label>
                        <textarea class="form-control" name="contenido">{{ is_object($model) ? $model->contenido : '' }} </textarea>
                    </div>

                    <div class="form-group">
                        <label>habilitado</label>
                        <select class="form-control" name="habilitado">
                            <option {{ $habilitado ? 'selected' : '' }} value="1">Si</option>
                            <option {{ !$habilitado ? 'selected' : '' }} value="0">No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Guardar
                    </button>

                </form>
            </div>
            @if(is_object($model))
                <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                    <form id="documento-adjuntar" method="post" enctype="multipart/form-data" action="{{ url('home/blog/adjuntar') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="blog_id" value="{{ $model->id }}" />

                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del documento" />
                        </div>

                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="file" name="archivo" class="form-control" />
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">
                            Adjuntar
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
