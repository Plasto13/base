<?php

namespace Modules\Base\Repositories\Cache;

use Modules\Base\Repositories\HallRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheHallDecorator extends BaseCacheDecorator implements HallRepository
{
    public function __construct(HallRepository $hall)
    {
        parent::__construct();
        $this->entityName = 'base.halls';
        $this->repository = $hall;
    }
}
