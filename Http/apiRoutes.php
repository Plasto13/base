<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/v1/base/equipment', 'middleware' => 'api.token'], function (Router $router) {
    // $router->post('/detail', [
    //     'as' => 'api.base.equipment.detail',
    //     'uses' => 'EquipmentController@show',
    //     'middleware' => 'token-can:pimodule.equipmentinspections.index',
    // ]);
    $router->post('/generate/api', [
        'as' => 'api.base.equipment.api.generate',
        'uses' => 'EquipmentController@generateApi',
        'middleware' => 'token-can:pimodule.equipmentinspections.index',
    ]);
    // $router->post('/delete', [
    //     'as' => 'api.menuitem.delete',
    //     'uses' => 'MenuItemController@delete',
    //     'middleware' => 'token-can:pimodule.equipmentinspections.destroy',
    // ]);
});
