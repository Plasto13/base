<?php

namespace Modules\Base\Repositories\Eloquent;

use Modules\Base\Repositories\EquipmentRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentEquipmentRepository extends EloquentBaseRepository implements EquipmentRepository
{
    public function getCollumnsPimodule()
    {
        return [
            'id' => [
                'name' => 'id',
                'data' => 'id',
                'title' => trans('pimodule::inspections.table.id'),
                'searchable' => false,
                'orderable' => true,
                // 'render' => 'function(){}',
                'footer' => trans('pimodule::inspections.table.id'),
                'exportable' => true,
                'printable' => true,
                'visible' => true,
                ],
        ];
    }

    public function getInspection($model, $inspections, $users, $modelName = null)
    {
        $html = [];

        foreach ($inspections as $inspection) {
                if ($modelName) {
                        //check if is conection betwin inspection and model
                        $detail = $inspection->$modelName()->find($model->id);
                }
            
            $html[] = "<tr><td>".\Form::checkbox('inspection['.$inspection->id.'][inspection_id]', $inspection->id, isset($detail), ['class' => 'flat-blue'])."</td><td>".$inspection->title."</td>
            <td>".\Form::select(
                            'inspection['.$inspection->id.'][user_id]',
                            $users,isset($detail['pivot']['user_id']) ? $detail['pivot']['user_id'] : null,
                            ['placeholder'=>'Select User','class'=>'form-control']).
                "</td>
                <td>"
                    .\Form::number('inspection['.$inspection->id.'][cycle]', isset($detail['pivot']['cycle']) ? $detail['pivot']['cycle'] : 7, ['class'=>'form-control']).
                "</td>
            </tr>";
        }
        return $html;
    }
}
