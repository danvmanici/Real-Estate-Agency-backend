<?php

use Illuminate\Support\Facades\Route;
use App\Models\Utilizator;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/daw', 'MyController@daw');
Route::get('/daw', function () {
    return "daw";
});

Route::get('/register/{name}/{email}/{password}/{role}', function ($name, $email, $password, $role) {
    error_log($name);
    $utilizator = new Utilizator;
    $utilizator->name = $name;
    $utilizator->email = $email;
    $utilizator->password = $password;
    $utilizator->role = $role;
    error_log($utilizator);
    $utilizator->save();

    return "ok";
});

Route::get('/register/{email}/{password}', function ($email, $password) {
    error_log($email);
    $utilizator = Utilizator::where('email', '=', $email)->get();
    error_log($utilizator);
    if ($utilizator[0]['password'] == $password) {
        $obj = new stdClass();
        $obj->email = $utilizator[0]['email'];
        $obj->name = $utilizator[0]['name'];
        return $obj;
    }
});
