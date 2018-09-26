<div class="form-group{{ $errors->has('equipment_number') ? ' has-error' : '' }}">
    {!! Form::label('equipment_number', trans('base::halls.form.equipment_number')) !!}
    {!! Form::text('equipment_number', old('equipment_number', $equipment->equipment_number), ['class' => 'form-control', 'placeholder' => trans('base::equipment.form.equipment_number')]) !!}
    {!! $errors->first('equipment_number', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("equipment_name") ? ' has-error' : '' }}">
    {!! Form::label("equipment_name", trans('base::equipment.form.equipment_name')) !!}
    {!! Form::text("equipment_name", old('equipment_name',$equipment->equipment_name), ['class' => 'form-control', 'placeholder' => trans('base::equipment.form.equipment_name')]) !!}
    {!! $errors->first("equipment_name", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("location") ? ' has-error' : '' }}">
    {!! Form::label("location", trans('base::equipment.form.location')) !!}
    {!! Form::text("location", old('location', $equipment->location), ['class' => 'form-control', 'placeholder' => trans('base::equipment.form.location')]) !!}
    {!! $errors->first("location", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("serial_number") ? ' has-error' : '' }}">
    {!! Form::label("serial_number", trans('base::equipment.form.serial_number')) !!}
    {!! Form::text("serial_number", old('serial_number', $equipment->serial_number), ['class' => 'form-control', 'placeholder' => trans('base::equipment.form.serial_number')]) !!}
    {!! $errors->first("serial_number", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("producer") ? ' has-error' : '' }}">
    {!! Form::label("producer", trans('base::equipment.form.producer')) !!}
    {!! Form::text("producer", old('producer', $equipment->producer), ['class' => 'form-control', 'placeholder' => trans('base::equipment.form.producer')]) !!}
    {!! $errors->first("producer", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("manuf_year") ? ' has-error' : '' }}">
    {!! Form::label("manuf_year", trans('base::halls.form.manuf_year')) !!}
    {!! Form::date("manuf_year", old('manuf_year', $equipment->manuf_year), ['class' => 'form-control', 'placeholder' => trans('base::equipment.form.manuf_year')]) !!}
    {!! $errors->first("manuf_year", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("commissioning") ? ' has-error' : '' }}">
    {!! Form::label("commissioning", trans('base::equipment.form.commissioning')) !!}
    {!! Form::date("commissioning", old('commissioning', $equipment->commissioning), ['class' => 'form-control', 'placeholder' => trans('base::equipment.form.commissioning')]) !!}
    {!! $errors->first("commissioning", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("sap_inven_number") ? ' has-error' : '' }}">
    {!! Form::label("sap_inven_number", trans('base::equipment.form.sap_inven_number')) !!}
    {!! Form::date("sap_inven_number", old('sap_inven_number', $equipment->sap_inven_number), ['class' => 'form-control', 'placeholder' => trans('base::equipment.form.sap_inven_number')]) !!}
    {!! $errors->first("sap_inven_number", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("type") ? ' has-error' : '' }}">
    {!! Form::label("type", trans('base::equipment.form.type')) !!}
    {!! Form::text("type", old('type', $equipment->type), ['class' => 'form-control', 'placeholder' => trans('base::equipment.form.type')]) !!}
    {!! $errors->first("type", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("position") ? ' has-error' : '' }}">
    {!! Form::label("position", trans('base::equipment.form.position')) !!}
    {!! Form::number("position", old("position", $equipment->position), ['class' => 'form-control', 'placeholder' => trans('base::equipment.form.position')]) !!}
    {!! $errors->first("position", '<span class="help-block">:message</span>') !!}
</div>
{!! Form::normalTextarea('note', trans('base::equipment.form.note'), $errors, $equipment) !!}
{!! Form::hidden('api_key', true) !!}



