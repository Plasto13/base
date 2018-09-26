<?php

namespace Modules\Base\Entities;

use Illuminate\Database\Eloquent\Model;

class EquipmentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'base__equipment_translations';
}
