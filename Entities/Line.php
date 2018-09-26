<?php

namespace Modules\Base\Entities;

// use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Entities\Equipment;
use Modules\Base\Entities\Hall;

class Line extends Model
{
    use SoftDeletes;
    // use Translatable;

    protected $table = 'base__lines';
    // public $translatedAttributes = [];
    protected $fillable = ['equipment_number', 'equipment_name', 'location', 'serial_number', 'producer', 'manuf_year',
						'commissioning', 'sap_inven_number', 'type', 'media', 'note','position'
						];
	
	public function hall()
	{
		return $this->belongsTo(Hall::class);
	}		

	public function equipment()
	{
		return $this->hasMany(Equipment::class);
	}

	public function inspection()
    {
    	if (is_module_enabled('Pimodule')) {
    		return $this->belongsToMany(\Modules\Pimodule\Entities\Inspection::class,'pimodule__equipment_inspection')
                    ->using(\Modules\Pimodule\Entities\EquipmentInspection::class)
    				->withPivot('last_check','next_check','user_name','cycle','user_id')
                    ->withTimestamps();
    	}
    	return false;
    }

    public function record()
    {
    	if (is_module_enabled('Pimodule')) {
        	return $this->hasManny(\Modules\Pimodule\Entities\Record::class);
        }
        return false;
    }
}
