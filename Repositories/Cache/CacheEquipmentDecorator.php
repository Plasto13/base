<?php

namespace Modules\Base\Repositories\Cache;

use Modules\Base\Repositories\EquipmentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheEquipmentDecorator extends BaseCacheDecorator implements EquipmentRepository
{
    public function __construct(EquipmentRepository $equipment)
    {
        parent::__construct();
        $this->entityName = 'base.equipment';
        $this->repository = $equipment;
    }
}
