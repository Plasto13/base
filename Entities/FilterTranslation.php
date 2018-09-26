<?php

namespace Modules\Base\Entities;

use Illuminate\Database\Eloquent\Model;

class FilterTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'base__filter_translations';
}
