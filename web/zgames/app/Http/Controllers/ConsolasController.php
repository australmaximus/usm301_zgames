<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
// Request: un objeto php que permite acceder a las cosas que me mandaron de la interfaz

//importar modelo
use App\Models\Consola;

//Aqui va toda la lógica vinculada a las consolas
class ConsolasController extends Controller
{
    public function getMarcas(){
        $marcas = array(); //$marcas = ["Sony","Microsoft","Nintendo","Sega"];
        $marcas[] = "Sony";
        $marcas[] = "Microsoft";
        $marcas[] = "Nintendo";
        $marcas[] = "Sega";

        return $marcas;
    }
    /**
    *Esta funciona va a ir a buscar todas las consolas que existen en la bd
    *y las va a retornar
    */
    public function getConsolas(){
        //Equivalente a un SELECT * FROM consolas
        $consolas = Consola::all();
        return $consolas;
    }

    /**
    *Esta funcion va a registrar una consola de ejemplo en la BD
    *TODO: Mejorar esto para que no sea un ejemplo
    * Una request es un objeto php que permite acceder a las cosas que me mandaron
    * desde la interfaz (desded el formulario)
    * CUANDO EL METODO RECIBE COSAS EL REQUEST VA EN LOS PARENTESIS
    */
    public function crearConsola(Request $request){
        $input = $request->all(); //Genera un arreglo con todo lo que mando la interfaz
        //Cuando hablo de la interfaz hablo de javascript
        //Equivalente a un INSER INTO bla bla
        $consola = new Consola();
        $consola->nombre = $input["nombre"];
        $consola->marca = $input["marca"];
        $consola->anio = $input["anio"];

        $consola->save(); //guarda en la base de datos
        return $consola;
    }

    public function eliminarConsola(Request $request){
        $input = $request->all();
        $id = $input["id"];
        //Eloquent: El administrador de BD de Laravel se llama Eloquent
        //1. Ir a buscar el registro a la BD
        $consola = Consola::findOrFail($id); //Permite buscar solo por clave primaria
        // Si la consola no existe, explota el codigo, la idea es capturar esa interfaz, manda una excepcion
        //2. Para eliminar llamo al metodo delete
        $consola->delete(); // DELETE FROM consolas WHERE id=1
        return "ok";
    }

}

// view productos.blade.php
// redenrizar los productos

//ProductosController:
// - ir a buscar los productos a la BD
// - Filtra por los disponibles
// - formatea el precio
// retorna lista de productos
