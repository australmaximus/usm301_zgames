<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//importamos los modelos
use App\Models\Juego;

use App\Models\Consola;

class JuegosController extends Controller
{
    //

    /*
     *   Va a obtener los juegos a partir de un id de consola
    */
    public function getJuegosByConsola(Request $request){
        $input = $request->all();
        $idConsola = $input["idConsola"];
        $consola = Consola::findOrFail($idConsola); //404
        return $consola->juegos()->get(); // SELECT J.* FROM juegos J JOIN consolas ON J.consola_id=C.id WHERE C.id=1
    }
    /*
     *   Devolver todos los juegos del sistema
    */
    public function getJuegos(){
        return Juego::all();
    }
    /*
     *   Crear un nuevo juego
    */
    public function save(Request $request){
        $input = $request->all();
        $nombre = $input["nombre"];
        $fecha = $input["fechaLanzamiento"];
        $apto = $input["aptoNinios"]; //apto_ninios snake case, aptoNinios camelizado
        $precio = $input["precio"];
        $descripcion = $input["descripcion"];
        $consolaId = $input["consolaId"];

        $juego = new Juego();
        $juego->nombre = $nombre;
        $juego->fecha_lanzamiento = $fecha; // ->nombre en la migracion
        $juego->descripcion = $descripcion;
        $juego->apto_ninios = $apto;
        $juego->precio = $precio;
        $juego->consola_id = $consolaId;
        //Guardar en la BD
        $juego->save();
        return $juego;

    }
    /*
     *   Eliminar un juego a partir de su id
    */
    public function remove(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $juego = Juego::findOrFail($id);
        $juego->delete();
        return "ok";
    }
}
