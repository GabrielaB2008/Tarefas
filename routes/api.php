<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/tarefa', [TarefaController::class, 'index']);
Route::get('/tarefa/find/{id}', [TarefaController::class, 'show']);
Route::post('/tarefa', [TarefaController::class, 'store']);
Route::put('/tarefa', [TarefaController::class, 'update']);
Route::delete('/tarefa/delete/{id}', [TarefaController::class, 'delete']);
