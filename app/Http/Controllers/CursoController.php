<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        return "Esta es la ruta de cursos";
    }

    public function create(){
        return "ES un formulario ";
    }

    public function show($curso){
        return "Bienvenido al Curso de $curso";
    }
}
