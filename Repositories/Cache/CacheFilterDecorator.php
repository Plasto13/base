<?php

namespace Modules\Base\Repositories\Cache;

use Modules\Base\Repositories\FilterRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFilterDecorator extends BaseCacheDecorator implements FilterRepository
{
    public function __construct(FilterRepository $filter)
    {
        parent::__construct();
        $this->entityName = 'base.filters';
        $this->repository = $filter;
    }
}
