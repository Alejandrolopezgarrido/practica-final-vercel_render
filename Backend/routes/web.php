<?php

use Illuminate\Support\Facades\Route;

// Ruta principal: Solo para saber que el servidor está encendido
Route::get('/', function () {
    return response()->json([
        'mensaje' => 'Servidor Backend de la Práctica funcionando',
        'estado' => 'OK'
    ]);
});

// Ruta de estudiantes: Devuelve datos, no una vista
Route::get('student', function(){
    return response()->json([
        ['id' => 1, 'nombre' => 'Juan Pérez'],
        ['id' => 2, 'nombre' => 'María García']
    ]);
});

// Ruta de cursos
Route::get('course', function(){
    return response()->json([
        ['id' => 101, 'titulo' => 'Desarrollo Web'],
        ['id' => 102, 'titulo' => 'Bases de Datos']
    ]);
});