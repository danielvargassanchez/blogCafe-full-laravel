<?php

Auth::routes();

Route::get('restringido', function () {
    return 'Acceso restringido';
})->name('restringido');

Route::get('/','IndexController@index');
Route::get('home','IndexController@index');

Route::get('index', 'IndexController@index')->name('index');
Route::get('nosotros', 'NosotrosController@index')->name('nosotros');
Route::get('cursos', 'CursosController@index')->name('cursos');

Route::resource('mostrar', 'CursosController');

Route::resource('contactar','ContactoController');
Route::resource('datos','DatosController');

Route::get('payment', array(
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));

Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));


Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function()
    {
        Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
        Route::resource('consejos','ConsejosController');
        Route::resource('nosotros','NosotrosController');
        Route::resource('cursos','CursosController');
        Route::resource('contacto','ContactoController');
        Route::resource('registros','RegistrosController');
    }
);
