<?php

namespace Modules\Base\Entities;

use Illuminate\Database\Eloquent\Model;

class LineTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'base__line_translations';
}
