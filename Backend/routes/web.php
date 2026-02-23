<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

// Página de inicio confirmando que la API está viva
Route::get('/', function () {
    return response()->json(['status' => 'API conectada a Base de Datos']);
});

// Rutas conectadas a tus controladores
Route::get('student', [StudentController::class, 'index']);
Route::get('course', [CourseController::class, 'index']);

// Si quieres ver un estudiante específico (ej: /student/1)
Route::get('student/{id}', [StudentController::class, 'show']);
Route::get('course/{id}', [CourseController::class, 'show']);

?>