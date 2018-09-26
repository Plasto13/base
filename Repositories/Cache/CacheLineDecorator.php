<?php

namespace Modules\Base\Repositories\Cache;

use Modules\Base\Repositories\LineRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheLineDecorator extends BaseCacheDecorator implements LineRepository
{
    public function __construct(LineRepository $line)
    {
        parent::__construct();
        $this->entityName = 'base.lines';
        $this->repository = $line;
    }
}
