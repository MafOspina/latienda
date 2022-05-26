<!--para que pueda inlcuirse en la masterpage-->
@extends('layouts.menu')

@section('contenido')

@if(session('mensajito'))
<div class="row">
    <span>{{ session('mensajito') }}</span>
</div>
@endif
<div class="row">
    <h1 class="blue-grey-text text-darken-2">Nuevo producto</h1>

</div>

<div class="row">
    <form method="POST" action="{{ route('productos.store') }}" class="col s12" >
        @csrf 
        <div class="row">
            <div class="input-field col s6">

            <input placeholder="Nombre del producto" value="{{ old('nombre') }}" type="text" id="nombre" name="nombre">
            <label for="nombre">Nombre</label>
            <span>{{ $errors->first('nombre') }}</span>

            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <textarea name="desc" id="desc" class="materialize-textarea"  >{{ old('desc')}}</textarea>
                <label for="desc">Descripción</label>
                <span>{{ $errors->first('desc') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <input placeholder="Precio" value="{{ old('precio')}}" type="number" id="precio" name="precio">
                <label for="precio">Precio</label>
                <span>{{ $errors->first('precio') }}</span>
            </div>
        </div>

        <div class="row">
       <div class="input-field col s6">
            <select name="marca" id="marca" >
                <option value="">Elija marca</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}">
                        {{ $marca->nombre }}
                    </option>
                @endforeach
            </select>
            <label for="marca">Elija la marca</label>
            <span>{{ $errors->first('marca') }}</span>
        </div> 
        </div>

        <div class="row">
        <div class="input-field col s6">
            <select name="categoria" id="categoria" >
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            <label for="categoria">Elija la categoria</label>
        </div>
        </div>
    

        <div class="row">
            <div class="file-field input-field col s6">
                <div class="btn">
                    <span>Imagen producto</span>
                    <input type="file" name="imagen">
                </div>

                <div class="file-path wrapper">
                    <input type="text" class="file-path">
                </div>
            </div>
        </div>

        <div class="row">
            <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
            </button>
        </div>
    </form>
</div>
@endsection