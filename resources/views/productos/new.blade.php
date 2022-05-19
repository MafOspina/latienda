<!--para que pueda inlcuirse en la masterpage-->
@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="blue-grey-text text-darken-2">Nuevo producto</h1>

</div>

<div class="row">
    <form class="col s12" action="">
        <div class="row">
            <div class="input-field col s6">

            <input placeholder="Nombre del producto" type="text" id="nombre" name="nombre">
            <label for="nombre">Nombre</label>


            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <textarea name="desc" id="desc" class="materialize-textarea"></textarea>
                <label for="desc">Descripción</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <input placeholder="Precio" type="number" id="precio" name="precio">
                <label for="precio">Precio</label>
            </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
            <select name="" id="marca" >
                @foreach($marcas as $marca)
                    <option value="">
                        {{ $marca->nombre }}
                    </option>
                @endforeach
            </select>
            <label for="marca">Elija la marca</label>
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