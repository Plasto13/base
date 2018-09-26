<?php

namespace Modules\Base\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Base\Entities\Filter;
use Modules\Base\Http\Requests\CreateFilterRequest;
use Modules\Base\Http\Requests\UpdateFilterRequest;
use Modules\Base\Repositories\FilterRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class FilterController extends AdminBaseController
{
    /**
     * @var FilterRepository
     */
    private $filter;

    public function __construct(FilterRepository $filter)
    {
        parent::__construct();

        $this->filter = $filter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$filters = $this->filter->all();

        return view('base::admin.filters.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('base::admin.filters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFilterRequest $request
     * @return Response
     */
    public function store(CreateFilterRequest $request)
    {
        $this->filter->create($request->all());

        return redirect()->route('admin.base.filter.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('base::filters.title.filters')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Filter $filter
     * @return Response
     */
    public function edit(Filter $filter)
    {
        return view('base::admin.filters.edit', compact('filter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Filter $filter
     * @param  UpdateFilterRequest $request
     * @return Response
     */
    public function update(Filter $filter, UpdateFilterRequest $request)
    {
        $this->filter->update($filter, $request->all());

        return redirect()->route('admin.base.filter.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('base::filters.title.filters')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Filter $filter
     * @return Response
     */
    public function destroy(Filter $filter)
    {
        $this->filter->destroy($filter);

        return redirect()->route('admin.base.filter.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('base::filters.title.filters')]));
    }
}
