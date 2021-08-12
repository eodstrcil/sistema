<?php
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;
use App\Models\Evento;
use App\Models\Institucion;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('auth.login');
});
*/

Route::get('/', function () {

    $eventos = Evento::all();
    return view('data', compact('eventos'));

    //return view('data');
});

Route::get('/detalle/{param?}', function ($param = '0') {
    $evento = Evento::find($param);
    $institucion = Institucion::find($evento->IdInstitucion);
    return view('detalle', compact('evento','param','institucion'));
});


Route::get('/registrarse', function () {
    return view('registrarse');
});


/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/empleado', function () {
    return view('empleado.index');
});
Route::get('/empleado/create',[EmpleadoController::class,'create']);
*/
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('tipo', TipoController::class)->middleware('auth');
Route::resource('institucion', InstitucionController::class)->middleware('auth');
Route::resource('evento', EventoController::class)->middleware('auth');
Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'],function() {
    
    Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
});