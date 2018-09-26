<?php

namespace Modules\Base\Entities;



trait Filters
{
	public $filters = [];

	public $route;

	public function __construct($filters = array(), $route)
	{
			$this->createFilter($filters, $route);
	}

	public function createFilter($filters = array(), $route)
	{
        foreach ($filters as $filter) {
        	if ($this->filters->contains('name', $filter['name'])) {
            	abort(500, "Sorry, you can't have two filters with the same name.");
        	}
        	$this->filters[] = new Filter($filter,$route);
        }

	}

}

class Filter
{
	public $route;

	public $name;

    public $type;

    public $title;

    public $placeholder;

    public $view;

    public $label;

    public $currentValue;

    public function __construct($filter = array(), $route)
    {
    	$this->checkOptionsIntegrity($filter);

    	$this->type = $filter['type'];
    	$this->title = $filter['title'];
    	$this->view = 'base::filters.'.$filter['type'];
    	$this->label = $filter['label'];
    	$this->route = $route;
    	// $this->currentValue = $filter['currentValue'];
    }

    public function checkOptionsIntegrity($options)
    {
        if (! isset($options['name'])) {
            abort(500, 'Please make sure all your filters have names.');
        }
        if (! isset($options['type'])) {
            abort(500, 'Please make sure all your filters have types.');
        }
        if (! \View::exists('crud::filters.'.$options['type'])) {
            abort(500, 'No filter view named "'.$options['type'].'.blade.php" was found.');
        }
        if (! isset($options['label'])) {
            abort(500, 'Please make sure all your filters have labels.');
        }
    }
}
