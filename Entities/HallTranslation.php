<?php

namespace Modules\Base\Entities;

use Illuminate\Database\Eloquent\Model;

class HallTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'base__hall_translations';
}
