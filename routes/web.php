<?php

use Illuminate\Http\Request;
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
})->name('welcome');
/* Routes statiques */
/* Retourne une chaine à partir d'une route, affiché sur une page html */

Route::get('/hello', function () {

    return 'hello';
})->name('hello');
/* Retourne des données json */
Route::get('/app_json', function () {

    return [
        'table' => 'test laravel',
    ];
});
/* Routes dynamique */
// Lien avec paramètre

Route::get('/hello/name', function () {

    return 'hello name';
});
Route::get('/hello/{name}', function (string $name) {

    return 'hello '.$name;
});

Route::get('blog/{slug}-{id}', function (string $slug, int $id) {
    return [
        'slug' => $slug,
        'id' => $id];
})->where(['id' => '[0-9]+', 'slug' => '[a-zA-Z0-9]+'])->name('blog.show');

// g érer les valeurs des paramètres dans une route
Route::get('/data2', function () {

    return $_GET;
});

// Autre manière plus propre

Route::get('/data', function (Request $request) {

    return [
        //Récupération paramètre spécifique
        'name' => $request->input('name', 'Jean'),
        // Récupération de tous le paramètre   
        'all' => $request->all()];
})->name('data');

Route::get('/new', function ()  {
    /* return [
        'welcome'=>route('welcome'),
        'hello'=>route('hello'),
    ]; */
    return redirect()->route('welcome');
})->name('new');

Route::get('/new2', function ()  {
    /* return [
        'welcome'=>route('welcome'),
        'hello'=>route('hello'),
    ]; */
    return to_route('blog.show', ['slug' => 'new-article','id' => 96]);
})->name('new2');