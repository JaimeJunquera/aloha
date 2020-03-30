@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <br>

    <h1 class="page-header">
        Lista de Inmuebles
    </h1>

    <hr>

    <a class="btn btn-primary btn-block" href="{{ url('home/blog/crud') }}">Nuevo registro</a>

    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th style="width:60px;>Documentos</th>
            <th style="width:150px;">Creado</th>
            <th style="width:150px;">Actualizado</th>
            <th style="width:160px;">Acciones</th>
        </tr>
        </thead>
        <tbody>

        @forelse ($model as $m)
            <tr>
                <td>
                    <a href="blog/ver/{{ $m->id }}">
                        {{ $m->titulo }}
                    </a>
                    @if($m->categoria != null)
                        <span class="help-block">
                            <br>
                            {{ $m->categoria->Nombre }}
                        </span>
                    @endif
                </td>
                <td>{{ $m->descripcion }}</td>
                <td>{{ $m->totalDocumentos }}</td>
                <td>{{ $m->created_at }}</td>
                <td>{{ $m->updated_at }}</td>
                <td class="text-center">
                    <a class="btn btn-xs btn-default" href="blog/crud/{{ $m->id }}">
                        <i class="oi oi-pencil"></i>
                    </a>
                    <a class="btn btn-xs btn-danger" href="/home/blog/eliminar/{{ $m->id }}">
                        <i class="oi oi-trash"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    -- No se han encontrado registros --
                </td>
            </tr>
        @endforelse

        </tbody>
    </table>

@endsection
