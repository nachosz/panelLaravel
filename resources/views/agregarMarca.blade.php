@extends('layouts.plantilla')

    @section('contenido')

        <h1>Alta de una nueva marca</h1>

        <div class="alert bg-light border col-8 mx-auto p-4">
            <form action="/agregarMarca" method="post">
                @csrf
                <input type="text" name="mkNombre"
                       placeholder="Ingrese nombre de marca"
                       class="form-control">
                <button class="btn btn-dark mt-3">
                    Agregar marca
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