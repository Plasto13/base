<?php

namespace Modules\Base\Entities;

// use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Entities\Equipment;
use Modules\Base\Entities\Line;

class Hall extends Model
{
    use SoftDeletes;
    // use Translatable;

    protected $table = 'base__halls';
    // public $translatedAttributes = [];
    protected $fillable = ['equipment_number', 'equipment_name', 'location', 'serial_number', 'producer', 'manuf_year',
    						'commissioning', 'sap_inven_number', 'type', 'media', 'note','position'
    						];

	public function line()
	{
		return $this->hasMany(Line::class);
	}

	public function equipment()
	{
		return $this->hasManyThrow(Equipment::class, Line::class);
	}	

	public function inspection()
    {
    	if (is_module_enabled('Pimodule')) {
    		return $this->belongsToMany(\Modules\Pimodule\Entities\Inspection::class,'pimodule__equipment_inspection')
                    ->using(\Modules\Pimodule\Entities\EquipmentInspection::class)
    				->withPivot('last_check','next_check','user_name','cycle','user_id')
                    ->withTimestamps();
    	}
    }

    public function record()
    {
    	if (is_module_enabled('Pimodule')) {
        	return $this->hasManny(Modules\Pimodule\Entities\Record::class);
        }
    }
}
