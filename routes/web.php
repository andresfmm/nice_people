<?php

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

Route::get('/', function (){
        return view('index');
});


Route::post('login', 'User\UserController@login', ['only'=>'login']);

//Route::get('login', 'User\UserController@index', ['only'=>'index']);


// rutas y acciones administrador
Route::get('/panel', function (){
        return view('index');
}); 
Route::get('/usuarios', function (){
        return view('index');
});
Route::get('/admin-proyectos', function (){
        return view('index');
});
// trae datos datatable usuarios para el administrador
Route::get('getUsuarios', 'User\UserController@getusuarios', ['only' => ['getusuarios']]);
// trae datos para vista actualizar empleados de administrador
Route::get('getupdateusuarios', 'User\UserController@getupdateusuarios', ['only' => ['getupdateusuarios']]);
// envia datos para actualizar usuario de administrador
Route::post('updateUser', 'User\UserController@updateUser', ['only' => ['updateUser']]);
// envia datos para eliminar usuario de administrador
Route::post('deleteUsuario', 'User\UserController@destroy', ['only' => ['destroy']]);
// envia datos para crear usuario de administrador
Route::post('createusuario', 'User\UserController@store', ['only' => ['store']]);

// usuario relacion a proyectos  
Route::get('getProyectos', 'Projects\ProjectsController@getproyectos', ['only' => ['getproyectos']]);
// trae datos para vista actualizar proyectos de administrador
Route::get('getupdateproyectos', 'Projects\ProjectsController@getupdateproyectos', ['only' => ['getupdateproyectos']]);
// envia datos para actualizar proyectos de administrador
Route::post('updateProyecto', 'Projects\ProjectsController@updateProyecto', ['only' => ['updateProyecto']]);






