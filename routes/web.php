<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//primera ruta
Route::get('hola', function() {
    echo "hola 24";
});

//ruta de arreglos
Route::get('arreglo', function() {
    $estudiantes = [
        "CA" => 1,
        "JO" => "Josè",
        "AN" => "Ana"
    ];

    //Recorrer arreglo
    foreach($estudiantes as $e){
        echo $e. "<hr/>";
    }

    //agregar elemneto en PHP
    $estudiantes["CR"]= "Cristian";
    var_dump($estudiantes);
    
    /*MOSTRAR COMO FUNCIONA 
     echo "<pre>"; 
    var_dump($estudiantes);
    echo "</pre>";*/
});

//ruta de un arreglo dentro de otro  
Route::get('paises', function(){
    //arreglo de paises
    $paises=[
        "Colombia" => [
            "capital" => "Bogotà",
            "moneda" => "Peso",
            "población" => 51,

            "ciudades" =>[
                "Medellìn",
                "Cali",
                "Barranquilla"
            ]
         ],

        "Peru" => [
            "capital" => "Lima",
            "moneda" => "Sol",
            "población" => 32,

            "ciudades" =>[
                "Arequipa",
                "Trujillo",
            ]
        ],
        "Paraguay" => [
            "capital" => "Asunciòn",
            "moneda" => "Guaranì",
            "población" => 7,

            "ciudades" =>[
                "Luque"
            ]
        ],
        "Ecuador" => [
            "capital" => "Quito",
            "moneda" => "USD",
            "población" => 17,

            "ciudades" =>[
                "Luque"
            ]
        ],
        "Chile" => [
            "capital" => "Santiago",
            "moneda" => "Peso",
            "población" => 19,

            "ciudades" =>[
                "Luque"
            ]
        ]
    ];

    //mostrar vista
    return view('paises')->with("paises",  $paises);

    //anàlizar la variable paises - varias dimensiones
    echo "<pre>";
    var_dump($paises);
    echo"</pre>";

    
});

Route::get('prueba', function(){
    return view('productos.new');
});


//rutas rest - resource
Route::resource('productos' , ProductoController::class );