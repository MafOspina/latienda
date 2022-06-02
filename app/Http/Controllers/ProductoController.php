<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //seleccionar todos los productos de la base de datos
        $productos = Producto::all();
        //mostrar el catalogo de productos llevandole la lista de productos
        return view('productos.index')
        ->with('productos' , $productos );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //selecciòn de todas las marcas
       $marcas = Marca::all();
        //selección de todas las categorias
        $categorias = Categoria::all();
        //llevar datos a la vista
        //llevandole marcas y categorias
       return view('productos.new')
       ->with('marcas' , $marcas)
       ->with('categorias' , $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {   

        //1. establecer las reglas de validaciòn que aploques a cada campo
        $reglas =[
          "nombre" => 'required|alpha',
          "desc" => 'required|min:20|max:50',
          "precio" => 'required|numeric',
          "marca" => 'required',
          "categoria" => 'required',
          "imagen" => 'required|image'
        ];
          //mensajes
          $mensajes = [
           "required" => "Campo obligatorio",
           "alpha" => "Solo letras",
           "min"=> "Mínimo 20 carácteres",
           "max"=> "Máximo 50 carácteres",
           "numeric" =>"Solo números",
           "image" => "Debe ser una imagen"
          ];
         

        //2.crear el objeto validador
        $v = Validator::make($r->all(), 
                             $reglas,
                             $mensajes
                            );

        //3. Validar la input data
        if($v->fails()){
         //validacion fallida, redireccionar al formulario
         return redirect('productos/create')
             ->withErrors($v)
             ->withInput();
      
        }else{
        //acceder a los atributos del archivo cargado
            $archivo = $r->imagen;
            $nombre_archivo = $archivo->getClientOriginalName();
        //ESTABLECER LA ubicacion donde se almacenarà el archivo
        //analizar la input data "imagen"
        
            $ruta=(public_path()."/img");
        //mover el archivo
            $archivo->move($ruta, $nombre_archivo);

            //validacion correcta
             //crear nuevo producto<<entity>>
            $p = new Producto;
        // asignamos valores a los atributos
            $p->nombre = $r->nombre;
            $p->desc = $r->desc;
            $p->imagen = $nombre_archivo;
            $p->precio = $r->precio;
            $p->marca_id = $r->marca;
            $p->categoria_id = $r->categoria;
        //guardar en db
             $p->save();
        //redireccionar al formulario con mensaje de exito(session)
        return redirect('productos/create')
        ->with('mensajito' , "Producto registrado");

        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "aqui van los detalles del producto con id: $producto ";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui va a ir el formulario para actualizar el producto: $producto ";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
