<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}

// view productos.blade.php
// redenrizar los productos

//ProductosController:
// - ir a buscar los productos a la BD
// - Filtra por los disponibles
// - formatea el precio
// retorna lista de productos
