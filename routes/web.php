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
//ruta home principal
Route::get('/', array('as' => 'index', 'uses' => 'ProductosController@index'));

Route::get('/About', ['as' => 'about', 'uses' => 'HomeController@about']);

Route::get('/Contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);

Route::get('/MapaWeb', ['as' => 'mapa', 'uses' => 'HomeController@mapaweb']);

Route::get('ver-producto/{id}', array('as' => 'ver_producto', 'uses' => 'ProductosController@ver_producto_completo'));

//rutas autentificacion (login/registro)
Auth::routes();


        //rutas de los productos. para acceder hay que autentificarse
Route::group(['prefix'=>'productos','middleware'=>'auth'],function () {
        Route::get('notificaciones', array('as' => 'notificaciones', 'uses' => 'ProductosController@notificaciones'));

    Route::get('crear-producto', array('as' => 'crear_producto', 'uses' => 'ProductosController@create'));

    Route::post('guardar-producto', array('as' => 'guardar_producto', 'uses' => 'ProductosController@store'));

    Route::get('borrar-producto/{id}', array('as' => 'borrar_producto', 'uses' => 'ProductosController@destroy'));

    Route::get('editar-producto/{id}', array('as' => 'editar_producto', 'uses' => 'ProductosController@edit'));

    Route::put('modificar-producto/{id}', array('as' => 'modificar_producto', 'uses' => 'ProductosController@modificar_producto'));


    Route::get('poner-favorito/{id}', array('as' => 'poner_favorito', 'uses' => 'ProductosController@producto_favorito'));


    Route::get('valoracion-compra/{id}', ['as' => 'valoracion_compra', 'uses' => 'ProductosController@valoracion_compra']);

    Route::post('guardar-valoracion-comprador/{id}', array('as' => 'guardar_valoracion_comprador', 'uses' => 'ProductosController@guardar_valoracion_comprador'));

    Route::get('venta-producto/{id}', array('as' => 'venta_producto', 'uses' => 'ProductosController@vender_producto'));

    Route::post('guardar-venta-producto/{id}', array('as' => 'guardar_venta_producto', 'uses' => 'ProductosController@guardar_venta_producto'));

    Route::get('mis-productos/{id}', ['as' => 'ver_productos_usuario', 'uses' => 'ProductosController@ver_productos_usuario']);

    Route::get('mis-productos-favoritos/{id}', ['as' => 'ver_productos_usuario_favoritos', 'uses' => 'ProductosController@ver_productos_usuario_favoritos']);

});

Route::group(['prefix'=>'usuario','middleware'=>'auth'],function () {
        Route::get('notificaciones', array('as' => 'notificaciones', 'uses' => 'HomeController@notificaciones'));
        Route::get('administrar-perfil/{id}',['as'=>'administrar_perfil','uses'=>'UserController@modificar_perfil']);
        Route::put('guardar-perfil/{id}',['as'=>'guardar_perfil','uses'=>'UserController@guardar_perfil']);

        Route::delete('borrar-perfil/{id}',['as'=>'borrar_perfil','uses'=>'UserController@borrar_perfil']);

        Route::get('perfil/{id}',['as'=>'perfil_publico','uses'=>'UserController@perfil_publico']);



    Route::get('administrar-perfil/{id}', ['as' => 'administrar_perfil', 'uses' => 'UserController@modificar_perfil']);

    Route::put('guardar-perfil/{id}', ['as' => 'guardar_perfil', 'uses' => 'UserController@guardar_perfil']);

    Route::delete('borrar-perfil/{id}', ['as' => 'borrar_perfil', 'uses' => 'UserController@borrar_perfil']);

    Route::get('perfil/{id}', ['as' => 'perfil_publico', 'uses' => 'UserController@perfil_publico']);
});

Route::group(['prefix' => 'errores'], function () {
    Route::get('403', ['as' => 'error_403', 'uses' => 'ErrorsController@error_403']);

    Route::get('404', ['as' => 'error_404', 'uses' => 'ErrorsController@error_404']);
});