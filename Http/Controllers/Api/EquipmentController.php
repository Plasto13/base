<?php

namespace Modules\Base\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Base\Repositories\EquipmentRepository;

use Illuminate\Routing\Controller;
use Modules\Base\Entities\Hall;
use Modules\Base\Entities\Line;
use Modules\Base\Entities\Equipment;
use Modules\Base\Http\Requests\CreateEquipmentRequest;
use Modules\Base\Http\Requests\UpdateEquipmentRequest;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('base::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('base::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('base::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('base::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function generateApi(Request $request)
    {
        $equipment = Equipment::findOrFail($request->id);
        if ($equipment->api_key) {
            return response()->json(['error' => false, 'message'=> trans('base::equipment.messages.api exist')]);
        }
        $equipment->api_key = true;
        if ($equipment->save()) {
            return response()->json(['error' => false, 'message'=> trans('base::equipment.messages.api generated')]);
        }
        return response()->json(['error' => true, 'message'=> trans('base::equipment.messages.api not generated')]);
    }
}
