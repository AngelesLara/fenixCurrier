<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\AI2Controller;
use App\Http\Controllers\AI3Controller;
use App\Http\Controllers\AIController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EncargadotruckController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\TruckController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');
Route::resource('usuarios', UsuarioController::class)->only(['index', 'edit', 'update'])->names('admin.usuarios');
Route::resource('roles', RoleController::class)->names('admin.roles');


Route::resource('empleados', EmpleadoController::class)->names('admin.empleados');
Route::resource('clientes', ClienteController::class)->names('admin.clientes');
Route::resource('paquetes', PaqueteController::class)->names('admin.paquetes');
Route::resource('trucks', TruckController::class)->names('admin.trucks');
Route::resource('envios', EnvioController::class)->names('admin.envios');
Route::resource('destinos', DestinoController::class)->names('admin.destinos');
Route::resource('encargadotrucks', EncargadotruckController::class)->names('admin.encargadotrucks');
Route::resource('salidas', SalidaController::class)->names('admin.salidas');
Route::post('salidas/{salida}/remove-envio', [SalidaController::class, 'removeEnvio'])->name('salidas.remove-envio');
Route::post('salidas/{salida}/add-envio', [SalidaController::class, 'addEnvio'])->name('salidas.add-envio');


Route::get('predicciones/pmv1', [AIController::class, 'index'])->name('admin.predicciones.pmv1');
Route::get('predicciones/pmv1', [AIController::class, 'predict'])->name('admin.predicciones.pmv1');

Route::get('predicciones/pmv2', [AI2Controller::class, 'index'])->name('admin.predicciones.pmv2');
Route::get('predicciones/pmv2', [AI2Controller::class, 'predict'])->name('admin.predicciones.pmv2');

Route::get('admin/predicciones/pmv3', [AI3Controller::class, 'index'])->name('admin.predicciones.pmv3');
Route::post('admin/predicciones/pmv3', [AI3Controller::class, 'predict'])->name('admin.predicciones.pmv3.predict');