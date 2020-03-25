<?php
$Habilitado = true;

if(is_object($model)){
    $Habilitado = ($model->Habilitado == 1);
}
?>

@extends('layouts.app')

@section('content')

    <h1 class="page-header">
        {{ is_object($model) ? $model->titulo : 'Nuevo registro' }}
    </h1>

    <form method="post" action="{{ url('home/blog/crud') }}">

        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ is_object($model) ? $model->id : '' }}"/>

        <div class="form-group">
            <label>Titulo</label>
            <input class="form-control" type="text" name="titulo" value="{{ is_object($model) ? $model->titulo : '' }}" />
        </div>

        <div class="form-group">
            <label>Descripcion</label>
            <textarea class="form-control" name="descripcion"> {{ is_object($model) ? $model->descripcion : '' }}</textarea>
        </div>

        <div class="form-group">
            <label>Contenido</label>
            <textarea class="form-control" name="contenido">{{ is_object($model) ? $model->contenido : '' }} </textarea>
        </div>

        <div class="form-group">
            <label>Habilitado</label>
            <select class="form-control" name="Habilitado">
                <option {{ $Habilitado ? 'selected' : '' }} value="1">Si</option>
                <option {{ $Habilitado ? 'selected' : '' }} value="0">No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Guardar
        </button>

    </form>

@endsection
