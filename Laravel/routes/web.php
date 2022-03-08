<?php

use Illuminate\Support\Facades\Route;
use App\Models\Utilizator;
use App\Models\Appointment;
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
    $utilizator->rgarsoniera = false;
    $utilizator->rapartament = false;
    $utilizator->rcasa = false;
    $utilizator->cgarsoniera = false;
    $utilizator->capartament = false;
    $utilizator->ccasa = false;
    error_log($utilizator);
    $utilizator->save();

    return "ok";
});

Route::get('/register/{email}/{password}', function ($email, $password) {
    error_log($email);
    $utilizator = Utilizator::where('password', '=', $password)->where('email', '=', $email)->get();
    error_log($utilizator);
    if ($utilizator[0]['password'] == $password) {
        $obj = new stdClass();
        $obj->id = $utilizator[0]['id'];
        $obj->email = $utilizator[0]['email'];
        $obj->name = $utilizator[0]['name'];
        $obj->rgarsoniera = $utilizator[0]['rgarsoniera'];
        $obj->rapartament = $utilizator[0]['rapartament'];
        $obj->rcasa = $utilizator[0]['rcasa'];
        $obj->cgarsoniera = $utilizator[0]['cgarsoniera'];
        $obj->capartament = $utilizator[0]['capartament'];
        $obj->ccasa = $utilizator[0]['ccasa'];
        return $obj;
    }
});

Route::get('/register/{id}/{name}/{email}/{rgarsoniera}/{rapartament}/{rcasa}/{cgarsoniera}/{capartament}/{ccasa}', function ($id, $name, $email, $rgarsoniera, $rapartament, $rcasa, $cgarsoniera, $capartament, $ccasa) {
    error_log("up");
    $utilizator = new Utilizator;
    $utilizator->id = $id;
    $utilizator->name = $name;
    $utilizator->email = $email;
    $utilizator->rgarsoniera = $rgarsoniera;
    $utilizator->rapartament = $rapartament;
    $utilizator->rcasa = $rcasa;
    $utilizator->cgarsoniera = $cgarsoniera;
    $utilizator->capartament = $capartament;
    $utilizator->ccasa = $ccasa;
    error_log($utilizator);
    // $utilizator->save();
    Utilizator::where('id', '=', $id)->update(['name' => $name, 'email' => $email, 'rgarsoniera' => $rgarsoniera, 'rapartament' => $rapartament, 'rcasa' => $rcasa, 'cgarsoniera' => $cgarsoniera, 'capartament' => $capartament, 'ccasa' => $ccasa]);
    return "ok";
});

Route::get('/appointment/{locuintaId}/{date}', function ($locuintaId, $date) {
    error_log($date);
    $appointment = new Appointment;
    $appointment->locuintaId = $locuintaId;
    $appointment->date = $date;
    error_log($appointment);

    $appointmentsList = Appointment::where('locuintaId', '=', $locuintaId)->where('date', '=', $date)->get();
    error_log($appointmentsList);
    // if (empty($appointmentsList)) {
    //     $appointment->save();
    //     return "appointment succeeds";
    // }
    // return "chose another date";
    return "appointment succeeds";
});
