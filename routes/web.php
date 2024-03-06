<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', function () {return view('welcome');});

//Bandas Controller
Route::get('/home', [BandController::class, 'show'])->name('home.index');

Route::get('/band/add', [BandController::class, 'addBand'])->name('bandas.add-band');

Route::get('/banda/view/{id}', [BandController::class, 'editBanda'])->name('bandas.view_banda');

Route::get('/banda/delete/{id}', [BandController::class, 'deleteBanda'])->name('banda.delete');

Route::post('/band/create',[BandController::class, 'createBand'])->name('bandas.createBand');

Route::POST('/banda/update', [BandController::class, 'updateBanda'])->name('banda.updateBanda');

//Albuns Controller

Route::get('/albuns/banda/{id}', [AlbumController::class, 'allAlbum'])->name('albuns.view'); //view de todos os albuns da banda

Route::get('/albuns/add', [AlbumController::class, 'addAlbum'])->name('albuns.add-album'); //view para adicionar e atribuir para uma banda

Route::post('/albuns/create', [AlbumController::class, 'createAlbum'])->name('albuns.createAlbum'); //view que chama a função de criar o album

Route::post('/albuns/update', [AlbumController::class, 'updateAlbum'])->name('albuns.update'); //view para chamar a função de atualizar um album

Route::get('/albuns/view/{id}', [AlbumController::class, 'viewAlbuns'])->name('album.viewUp'); //view para clicar no album NOT WORKKING*****////

Route::get('/albuns/delete/{id}', [AlbumController::class, 'deleteAlbum'])->name('albuns.delete'); //deletar albuns


//Route::get('/', [AlbumController::class, ''])->name('');



// Route::get('/', [UserController::class, ''])->name('');

// Route::get('/', [UserController::class, ''])->name('');


// //Dashboard
Route::get('home/dashboard', [DashboardController::class, 'viewDashboard'])->name('home.dashboard');



//User Controller

Route::get('/users/add', [UserController::class, 'addUser']
)->name('users.add');

Route::post('/users/create', [UserController::class,  'createUser'])
->name('users.create');

Route::post('/users/update', [UserController::class,  'updateUser'])
->name('users.update');

Route::get('/users/view/{id}', [UserController::class, 'viewUser']
)->name('users.view');

Route::get('/users/delete/{id}', [UserController::class, 'deleteUser']
)->name('users.delete');

//fall
