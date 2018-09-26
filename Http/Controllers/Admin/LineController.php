<?php

namespace Modules\Base\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Base\Entities\Hall;
use Modules\Base\Entities\Line;
use Modules\Base\Http\Requests\CreateLineRequest;
use Modules\Base\Http\Requests\UpdateLineRequest;
use Modules\Base\Repositories\LineRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class LineController extends AdminBaseController
{
    /**
     * @var LineRepository
     */
    private $line;

    public function __construct(LineRepository $line)
    {
        parent::__construct();

        $this->line = $line;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Hall $hall)
    {
        //$lines = $this->line->all();

        return view('base::admin.lines.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Hall $hall)
    {
        return view('base::admin.lines.create', compact('hall'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateLineRequest $request
     * @return Response
     */
    public function store(Hall $hall,CreateLineRequest $request)
    {
        $hall->line()->create($request->all());

        return redirect()->route('admin.base.hall.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('base::lines.title.lines')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Line $line
     * @return Response
     */
    public function edit(Hall $hall, Line $line)
    {
        return view('base::admin.lines.edit', compact('hall', 'line'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Line $line
     * @param  UpdateLineRequest $request
     * @return Response
     */
    public function update(Hall $hall, Line $line, UpdateLineRequest $request)
    {
        $this->line->update($line, $request->all());

        return redirect()->route('admin.base.hall.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('base::lines.title.lines')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Line $line
     * @return Response
     */
    public function destroy(Hall $hall, Line $line)
    {
        $this->line->destroy($line);

        return redirect()->route('admin.base.hall.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('base::lines.title.lines')]));
    }
}
