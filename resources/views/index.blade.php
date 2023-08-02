@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12 mt-2">
        <div>
            <h2 class="text-white">CRUD de Mangas</h2>
        </div>
        <div>
            <a href="{{route('mangas.create')}}" class="btn btn-success">Agregar Manga</a>
        </div>
    </div>

    @if (Session::get('success'))
        <div class="alert alert-success mt-2">
            <strong>{{Session::get('success')}}</strong><br>
        </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Título</th>
                <th>Mangaka</th>
                <th>Editorial</th>
                <th>Acción</th>
            </tr>
            @foreach ($mangas as $manga)
            <tr>
                <td class="fw-bold">{{$manga->title}}</td>
                <td>{{$manga->mangaka}}</td>
                <td class="text-center">
                    <span class="badge bg-primary fs-6">{{$manga->editorial}}</span>
                </td>
                <td class="text-center">
                    <a href="{{route('mangas.edit', $manga)}}" class="btn btn-warning">Editar</a>

                    <form action="{{route('mangas.destroy', $manga)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$mangas->links()}}
    </div>
</div>
@endsection