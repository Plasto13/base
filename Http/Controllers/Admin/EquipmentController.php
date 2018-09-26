<?php

namespace Modules\Base\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Base\Entities\Hall;
use Modules\Base\Entities\Line;
use Modules\Base\Entities\Equipment;
use Modules\Base\Http\Requests\CreateEquipmentRequest;
use Modules\Base\Http\Requests\UpdateEquipmentRequest;
use Modules\Base\Repositories\EquipmentRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class EquipmentController extends AdminBaseController
{
    /**
     * @var EquipmentRepository
     */
    private $equipment;

    public function __construct(EquipmentRepository $equipment)
    {
        parent::__construct();

        $this->equipment = $equipment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Hall $hall, Line $line)
    {
        //$equipment = $this->equipment->all();

        return view('base::admin.hall.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Hall $hall, Line $line)
    {
        return view('base::admin.equipment.create', compact('hall', 'line'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateEquipmentRequest $request
     * @return Response
     */
    public function store(Hall $hall, Line $line, CreateEquipmentRequest $request)
    {
        $line->equipment()->create($request->all());

        return redirect()->route('admin.base.hall.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('base::equipment.title.equipment')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Equipment $equipment
     * @return Response
     */
    public function edit(Hall $hall, Line $line,Equipment $equipment)
    {
        // dd($equipment);
        return view('base::admin.equipment.edit', compact('hall', 'line', 'equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Equipment $equipment
     * @param  UpdateEquipmentRequest $request
     * @return Response
     */
    public function update(Hall $hall, Line $line, Equipment $equipment, UpdateEquipmentRequest $request)
    {
        $saved = $this->equipment->update($equipment, $request->all());
        return redirect()->route('admin.base.hall.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('base::equipment.title.equipment')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Equipment $equipment
     * @return Response
     */
    public function destroy(Hall $hall, Line $line, Equipment $equipment)
    {
        $this->equipment->destroy($equipment);

        return redirect()->route('admin.base.hall.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('base::equipment.title.equipment')]));
    }
}
