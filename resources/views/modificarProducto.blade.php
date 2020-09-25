@extends('layouts.plantilla')

@section('contenido')


        <h1>Modificación de un producto</h1> 

        <div class="alert bg-light p-3 border">
            <form action="/modificarProducto" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                Nombre: <br>
                <input type="text" name="prdNombre" class="form-control" value="{{$producto->prdNombre}}">
                <br>
                Precio: <br>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="prdPrecio" class="form-control" value="{{$producto->prdPrecio}}">
                </div>
                <br>
                Marca: <br>
                <select name="idMarca" class="form-control" required >
                    
                    <option value="{{$producto->idMarca}}">{{$producto->relMarca->mkNombre}}</option>
                    @foreach($marcas as $marca)
                    <option value="{{$marca->idMarca}}">{{$marca->mkNombre}}</option>
                    @endforeach
                </select>
                <br>
                Categoría: <br>
                <select name="idCategoria" class="form-control" required>
                    <option value={{$producto->idCategoria}}>{{$producto->relCategoria->catNombre}}</option>
                     @foreach($categorias as $categoria)
                    <option value="{{$categoria->idCategoria}}">{{$categoria->catNombre}}</option>
                    @endforeach
                </select>
                <br>
                Presentacion: <br>
                <input type="text" name="prdPresentacion" class="form-control" value="{{$producto->prdPresentacion}}">
                <br>
                Stock: <br>
                <input type="number" name="prdStock" class="form-control" min="0" value="{{$producto->prdStock}}">
                <br>
                Imagen: <br>
                <input type="file" name="prdImagen" class="form-control" value="{{$producto->prdImagen}}">
                <img src="/productos/{{$producto->prdImagen}}" class="img-thumbnail">
                <input type="hidden" name="idProducto" value="{{$producto->idProducto}}">
                <br>
                <input type="submit" value="Modificar Producto" class="btn btn-secondary mb-3">
                <a href="/adminProductos" class="btn btn-light mb-3">Volver al panel de Productos</a>
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

