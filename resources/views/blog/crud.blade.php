<?php
$habilitado = true;

if(is_object($model)){
    $habilitado = ($model->habilitado == 1);
}
?>

@extends('layouts.app')

@section('content')

{{--    <h1 class="page-header">--}}
{{--        {{ is_object($model) ? $model->titulo : 'Nuevo registro' }}--}}
{{--    </h1>--}}
{{--    @if (count($errors) > 0)--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

    <form method="post" action="{{ url('home/blog/crud') }}">

        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ is_object($model) ? $model->id : '' }}"/>

        <div class="form-group {{ $errors->has('categoria_id') ? ' has-error' : '' }}">
            <label>Categoria</label>
            <select class="form-control" name="categoria_id">
                @foreach($categorias as $c) @if(is_object($model))
                    <option {{ $model->categoria_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->nombre }}</option>
                @else
                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                @endif @endforeach
            </select>
            @if ($errors->has('categoria_id'))
                <span class="help-block">
                     <strong>{{ $errors->first('categoria_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
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

@endsection
