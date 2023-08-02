@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Manga</h2>
        </div>
        <div>
            <a href="{{route('mangas.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <strong>No se pudo agregar el manga</strong> Recuerda que...<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('mangas.update', $manga)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Manga:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Nombre del manga" value="{{$manga->title}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Mangaka:</strong>
                    <input type="text" name="mangaka" class="form-control" placeholder="Nombre del mangaka" value="{{$manga->mangaka}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Editorial:</strong>
                    <select name="editorial" class="form-select" id="">
                        <option value="">-- Elige la editorial --</option>
                        <option value="Panini" @selected("Panini" == $manga->editorial)>Panini</option>
                        <option value="Kamite" @selected("Kamite" == $manga->editorial)>Kamite</option>
                        <option value="Distrito Manga" @selected("Distrito Manga" == $manga->editorial)>Distrito Manga</option>
                        <option value="Planeta" @selected("Planeta" == $manga->editorial)>Planeta</option>
                        <option value="Otro" @selected("Otro" == $manga->editorial)>Otro</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection