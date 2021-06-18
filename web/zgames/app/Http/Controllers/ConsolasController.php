<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

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
    */
    public function crearConsola(){
        //Equivalente a un INSER INTO bla bla
        $consola = new Consola();
        $consola->nombre = "Nintendo Switch";
        $consola->marca = "Nintendo";
        $consola->anio = 2017;

        $consola->save();
        return $consola;
    }

}

// view productos.blade.php
// redenrizar los productos

//ProductosController:
// - ir a buscar los productos a la BD
// - Filtra por los disponibles
// - formatea el precio
// retorna lista de productos
