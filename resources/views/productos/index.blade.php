@extends('layouts.menu')

@section('contenido')

<div class="row">
    <h1>Catálogo de productos</h1>
</div>

<div class="row">
        
    <div class="input-field col s5">
    @foreach($productos as $producto)

    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" width="100" height="300" 
            @if(is_null($producto->imagen)) 
            src="{{asset('img/nodisponible.jpg')}}"
            @else 
            src="{{ asset('img/'.$producto->imagen) }}"
            @endif 
            >
        </div>
        <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">{{ $producto->nombre }}<i class="material-icons right">Ver</i></span>
            <p><a href="#">Ver detalles ...</a></p>
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">{{ $producto->nombre }}<i class="material-icons right">close</i></span>
            <ul>
                <li>Descripcion: {{ $producto->desc }}</li>
                <li>Precio: {{ $producto->precio }}</li>
                <li>Categoria: {{ $producto->categoria()->get()->nombre }}</li>
                <li>Marca: {{ $producto->marca_id }}</li>
            </ul>
        </div>
    </div>


    @endforeach

    @endsection
</div>
</div>