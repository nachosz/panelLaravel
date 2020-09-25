@extends('layouts.plantilla')

    @section('contenido')

        <h1>Modificación de una marca</h1>

        <div class="alert bg-light border col-8 mx-auto p-4">
            <form action="/modificarMarca" method="post">
                @csrf
                @method('patch')
                <input type="text" name="mkNombre"
                       value="{{ $marca->mkNombre }}"
                       placeholder="Ingrese nombre de marca"
                       class="form-control">
                <input type="hidden" name="idMarca"
                       value="{{ $marca->idMarca }}">
                <button class="btn btn-dark mt-3">
                    Modificar marca
                </button>
            </form>
        </div>

        @if( $errors->any() )
            <div class="alert alert-danger col-8 mx-auto">
                <ul>
                    @foreach( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    @endsection