<?php

use App\Http\Controllers\Admin\ClientController;
use Illuminate\Support\Facades\Route;

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
    $sliders = \App\Slider::all();
    return view('welcome', ['sliders' => $sliders]);
});

Route::get('/aboutus', function () {
    return view('about');
});
Route::get('/contactus', function () {
    return view('contact');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/services/financial', function () {
    return view('financial');
});
Route::get('/services/programming', function () {
    return view('programming');
});
Route::get('/services/estates', 'EstateController@loadCities');
Route::get('/services/estates/{id}', 'EstateController@loadEstates');
Route::get('/services/estates/detail/{id}', 'EstateController@loadEstateDetail');

Route::get('/contact/send', 'MailController@send_email');


Route::get('/jobs', 'JobController@loadJobs');
Route::get('/jobs/{id}', 'JobController@loadJobDetail');


Route::get('/signup', 'AccountController@loginView')->name('login');
Route::post('/signup', 'AccountController@signup');
Route::post('/login', 'AccountController@login');
Route::get('/varify', 'AccountController@varifyView')->name('varify');
Route::post('/varify', 'AccountController@varify');
Route::get('/forget', 'AccountController@forgetView');
Route::post('/forget', 'AccountController@forget');


Route::middleware('auth')->group(function () {
    Route::middleware('role:0')->group(function () {
        Route::get('/profile', 'AccountController@profileView');
        Route::post('/update', 'AccountController@update');
        Route::get('/logout', 'AccountController@logout');
        Route::get('/orders/{id}', 'EstateController@loadOrderDetail');
        Route::post('/estate-request', 'EstateController@sendEstateRequest');
        Route::post('/programming-request', 'EstateController@sendProgrammingRequest');
        Route::post('/finance-request', 'EstateController@sendFinanceRequest');
        Route::post('/send-extra', 'EstateController@sendMissedFile');
        Route::post('/send-decision', 'EstateController@sendUserDecision');
        Route::post('/job-request', 'JobController@sendJobRequest');
    });
});


Route::prefix('dashboard')->group(function () {
    Route::get('/login', 'Admin\UserController@loginView')->name('admin-login');
    Route::post('/login', 'Admin\UserController@login');

    Route::middleware(['admin_auth', 'admin_role'])->group(function () {
        Route::get('/', 'Admin\HomeController@index');

        Route::get('/users/logout', 'Admin\UserController@logout');
        Route::get('/setting', 'Admin\UserController@setting');
        Route::get('/settings', 'Admin\UserController@settings');
        Route::get('/consult', 'Admin\UserController@consult');
        Route::put('/setting', 'Admin\UserController@updateSetting');

        //        Route::resource('/users', 'Admin\UserController');
        Route::get('/users', 'Admin\UserController@index');
        Route::get('/users/create', 'Admin\UserController@create');
        Route::post('/users', 'Admin\UserController@store');
        Route::get('/users/{id}', 'Admin\UserController@show');
        Route::get('/users/{id}/edit', 'Admin\UserController@edit');
        Route::put('/users/{id}', 'Admin\UserController@update');
        Route::delete('/users/{id}', 'Admin\UserController@destroy');

        //        Route::resource('/regions', 'Admin\RegionController');
        Route::get('/regions', 'Admin\RegionController@index');
        Route::get('/regions/create', 'Admin\RegionController@create');
        Route::post('/regions', 'Admin\RegionController@store');
        Route::get('/regions/{id}', 'Admin\RegionController@show');
        Route::get('/regions/{id}/edit', 'Admin\RegionController@edit');
        Route::put('/regions/{id}', 'Admin\RegionController@update');
        Route::delete('/regions/{id}', 'Admin\RegionController@destroy');

        //        Route::resource('/jobs', 'Admin\JobController');
        Route::get('/jobs', 'Admin\JobController@index');
        Route::get('/jobs/create', 'Admin\JobController@create');
        Route::post('/jobs', 'Admin\JobController@store');
        Route::get('/jobs/{id}', 'Admin\JobController@show');
        Route::get('/jobs/{id}/edit', 'Admin\JobController@edit');
        Route::put('/jobs/{id}', 'Admin\JobController@update');
        Route::delete('/jobs/{id}', 'Admin\JobController@destroy');

        //        Route::resource('/estates', 'Admin\EstateController');
        Route::get('/estates', 'Admin\EstateController@index');
        Route::get('/estates/create', 'Admin\EstateController@create');
        Route::post('/estates', 'Admin\EstateController@store');
        Route::get('/estates/{id}', 'Admin\EstateController@show');
        Route::get('/estates/{id}/edit', 'Admin\EstateController@edit');
        Route::put('/estates/{id}', 'Admin\EstateController@update');
        Route::delete('/estates/{id}', 'Admin\EstateController@destroy');

        //        Route::resource('/estates/images', 'Admin\ImageController');
        Route::get('/estates/images', 'Admin\ImageController@index');
        Route::get('/estates/images/create', 'Admin\ImageController@create');
        Route::post('/estates/images', 'Admin\ImageController@store');
        Route::get('/estates/images/{id}', 'Admin\ImageController@show');
        Route::get('/estates/images/{id}/edit', 'Admin\ImageController@edit');
        Route::put('/estates/images/{id}', 'Admin\ImageController@update');
        Route::delete('/estates/images/{id}', 'Admin\ImageController@destroy');

        //        Route::resource('/orders/estates', 'Admin\ERequestsController');
        Route::get('/orders/estates', 'Admin\ERequestsController@index');
        Route::get('/orders/estates/create', 'Admin\ERequestsController@create');
        Route::post('/orders/estates', 'Admin\ERequestsController@store');
        Route::get('/orders/estates/{id}', 'Admin\ERequestsController@show');
        Route::get('/orders/estates/{id}/edit', 'Admin\ERequestsController@edit');
        Route::put('/orders/estates/{id}', 'Admin\ERequestsController@update');
        Route::delete('/orders/estates/{id}', 'Admin\ERequestsController@destroy');

        //        Route::resource('/orders/programming', 'Admin\PRequestsController');
        Route::get('/orders/programming', 'Admin\PRequestsController@index');
        Route::get('/orders/programming/create', 'Admin\PRequestsController@create');
        Route::post('/orders/programming', 'Admin\PRequestsController@store');
        Route::get('/orders/programming/{id}', 'Admin\PRequestsController@show');
        Route::get('/orders/programming/{id}/edit', 'Admin\PRequestsController@edit');
        Route::put('/orders/programming/{id}', 'Admin\PRequestsController@update');
        Route::delete('/orders/programming/{id}', 'Admin\PRequestsController@destroy');

        //        Route::resource('/orders/financial', 'Admin\FRequestsController');
        Route::get('/orders/financial', 'Admin\FRequestsController@index');
        Route::get('/orders/financial/create', 'Admin\FRequestsController@create');
        Route::post('/orders/financial', 'Admin\FRequestsController@store');
        Route::get('/orders/financial/{id}', 'Admin\FRequestsController@show');
        Route::get('/orders/financial/{id}/edit', 'Admin\FRequestsController@edit');
        Route::put('/orders/financial/{id}', 'Admin\FRequestsController@update');
        Route::delete('/orders/financial/{id}', 'Admin\FRequestsController@destroy');

        //        Route::resource('/orders/jobs', 'Admin\JRequestsController');
        Route::get('/orders/jobs', 'Admin\JRequestsController@index');
        Route::get('/orders/jobs/create', 'Admin\JRequestsController@create');
        Route::post('/orders/jobs', 'Admin\JRequestsController@store');
        Route::get('/orders/jobs/{id}', 'Admin\JRequestsController@show');
        Route::get('/orders/jobs/{id}/edit', 'Admin\JRequestsController@edit');
        Route::put('/orders/jobs/{id}', 'Admin\JRequestsController@update');
        Route::delete('/orders/jobs/{id}', 'Admin\JRequestsController@destroy');

        //        Route::resource('/sliders', 'Admin\SliderController');
        Route::get('/sliders', 'Admin\SliderController@index');
        Route::get('/sliders/create', 'Admin\SliderController@create');
        Route::post('/sliders', 'Admin\SliderController@store');
        Route::get('/sliders/{id}', 'Admin\SliderController@show');
        Route::get('/sliders/{id}/edit', 'Admin\SliderController@edit');
        Route::put('/sliders/{id}', 'Admin\SliderController@update');
        Route::delete('/sliders/{id}', 'Admin\SliderController@destroy');

        Route::get('/clients', [ClientController::class , 'index'])->name('show-clients');


        Route::get('/clients/create', [ClientController::class , 'create'])->name('create-client');
        Route::post('/clients', [ClientController::class , 'store'])->name('store-client');

        Route::get('/clients/{id}/edit', [ClientController::class , 'edit'])->name('edit-client');
        Route::put('/clients/update/{id}', [ClientController::class , 'update'])->name('update-client');

        Route::get('/clients/{id}/show', [ClientController::class , 'show'])->name('show-client');


        Route::delete('/clients/delete/{id}', [ClientController::class , 'destroy']);


        Route::post('/orders/financial/report', 'Admin\FRequestsController@sendReport');
    });
});


Route::prefix('storage')->group(function () {
    Route::any('/{any}', function ($path) {


        $path = storage_path('app/public/' . $path);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    })->where('any', '.*');
});


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";
});


Route::get('/home', 'HomeController@index')->name('home');
