<?php

namespace Modules\Base\Entities;

// use Dimsav\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use SoftDeletes;

    protected $api = true;
    // use Translatable;

    protected $table = 'base__equipment';
    // public $translatedAttributes = [];
    protected $fillable = ['equipment_number', 'equipment_name', 'location', 'serial_number', 'producer', 'manuf_year',
						'commissioning', 'sap_inven_number', 'type', 'media', 'note','position', 'api_key'
						];

	public function line()
	{
		return $this->belongsTo(Line::class);
	}

	public function hall()
	{
		return $this->line->hall;
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
        	return $this->hasMany(\Modules\Pimodule\Entities\Record::class);
        }
    }

    public function planRepair()
    {
        return $this->hasManyThrough(\Modules\Pimodule\Entities\PlanRepair::class, \Modules\Pimodule\Entities\Record::class);
    }

    public function setApiKeyAttribute($value)
    {
        if ($this->api_key == null) {
            $this->attributes['api_key'] = bcrypt($this->equipment_name.Carbon::now());
        }
        // return $this->api_key;
    }


}
