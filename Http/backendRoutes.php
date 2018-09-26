<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/base'], function (Router $router) {
    $router->bind('hall', function ($id) {
        return app('Modules\Base\Repositories\HallRepository')->find($id);
    });
    $router->get('halls', [
        'as' => 'admin.base.hall.index',
        'uses' => 'HallController@index',
        'middleware' => 'can:base.halls.index'
    ]);
    $router->get('halls/create', [
        'as' => 'admin.base.hall.create',
        'uses' => 'HallController@create',
        'middleware' => 'can:base.halls.create'
    ]);
    $router->post('halls', [
        'as' => 'admin.base.hall.store',
        'uses' => 'HallController@store',
        'middleware' => 'can:base.halls.create'
    ]);
    $router->get('halls/{hall}/edit', [
        'as' => 'admin.base.hall.edit',
        'uses' => 'HallController@edit',
        'middleware' => 'can:base.halls.edit'
    ]);
    $router->put('halls/{hall}', [
        'as' => 'admin.base.hall.update',
        'uses' => 'HallController@update',
        'middleware' => 'can:base.halls.edit'
    ]);
    $router->delete('halls/{hall}', [
        'as' => 'admin.base.hall.destroy',
        'uses' => 'HallController@destroy',
        'middleware' => 'can:base.halls.destroy'
    ]);
    $router->bind('line', function ($id) {
        return app('Modules\Base\Repositories\LineRepository')->find($id);
    });
    $router->get('halls/{hall}/lines', [
        'as' => 'admin.base.line.index',
        'uses' => 'LineController@index',
        'middleware' => 'can:base.lines.index'
    ]);
    $router->get('halls/{hall}/lines/create', [
        'as' => 'admin.base.line.create',
        'uses' => 'LineController@create',
        'middleware' => 'can:base.lines.create'
    ]);
    $router->post('halls/{hall}/lines', [
        'as' => 'admin.base.line.store',
        'uses' => 'LineController@store',
        'middleware' => 'can:base.lines.create'
    ]);
    $router->get('halls/{hall}/lines/{line}/edit', [
        'as' => 'admin.base.line.edit',
        'uses' => 'LineController@edit',
        'middleware' => 'can:base.lines.edit'
    ]);
    $router->put('halls/{hall}/lines/{line}', [
        'as' => 'admin.base.line.update',
        'uses' => 'LineController@update',
        'middleware' => 'can:base.lines.edit'
    ]);
    $router->delete('halls/{hall}/lines/{line}', [
        'as' => 'admin.base.line.destroy',
        'uses' => 'LineController@destroy',
        'middleware' => 'can:base.lines.destroy'
    ]);
    $router->bind('equipment', function ($id) {
        return app('Modules\Base\Repositories\EquipmentRepository')->find($id);
    });
    $router->get('halls/{hall}/lines/{line}/equipment', [
        'as' => 'admin.base.equipment.index',
        'uses' => 'EquipmentController@index',
        'middleware' => 'can:base.equipment.index'
    ]);
    $router->get('halls/{hall}/lines/{line}/equipment/create', [
        'as' => 'admin.base.equipment.create',
        'uses' => 'EquipmentController@create',
        'middleware' => 'can:base.equipment.create'
    ]);
    $router->post('halls/{hall}/lines/{line}/equipment', [
        'as' => 'admin.base.equipment.store',
        'uses' => 'EquipmentController@store',
        'middleware' => 'can:base.equipment.create'
    ]);
    $router->get('halls/{hall}/lines/{line}/equipment/{equipment}/edit', [
        'as' => 'admin.base.equipment.edit',
        'uses' => 'EquipmentController@edit',
        'middleware' => 'can:base.equipment.edit'
    ]);
    $router->put('halls/{hall}/lines/{line}/equipment/{equipment}', [
        'as' => 'admin.base.equipment.update',
        'uses' => 'EquipmentController@update',
        'middleware' => 'can:base.equipment.edit'
    ]);
    $router->delete('halls/{hall}/lines/{line}/equipment/{equipment}', [
        'as' => 'admin.base.equipment.destroy',
        'uses' => 'EquipmentController@destroy',
        'middleware' => 'can:base.equipment.destroy'
    ]);
// append




});
