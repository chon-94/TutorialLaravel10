<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/prueba', function () {
//     return 'Prueba detail ';
// })

//La variable prb la debemos de mandar por la funcion para usarla en el retorno
//bien como comentamos la anterior ruta la detail... tendremos un problema para mostrar vista prueba sola
//para solucionar debemos de ponerle el signo ?  al parametro prb para volverlo opcional
// Route::get('/prueba/{prb?}', function ($prb='si detail') {
//     return 'Prueba no detail :P  '. $prb;
// });

// con esa condicion decimos que si el espacion es en blanco que lleve al siguiente destino
// Route::get('/prueba/{prb?}', function ($prb='si detail') {
//     if ($prb === ''){
//         return redirect('/prueba'); 
//     }
//     return 'Prueba no detail :P  '. $prb;
// });


//podemos darle nombre a las rutas para evitar la referencia directa a la ruta
Route::get('/prueba', function () {
    return 'Prueba detail ';
})->name('prueba.index');


Route::get('/prueba/{prb?}', function ($prb='si detail') {
    if ($prb === ''){
        return to_route('prueba.index'); 
    }
    return 'Prueba no detail :P  '. $prb;
});




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
