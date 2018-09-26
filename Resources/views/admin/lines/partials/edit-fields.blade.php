<div class="form-group{{ $errors->has('equipment_number') ? ' has-error' : '' }}">
    {!! Form::label('equipment_number', trans('base::lines.form.equipment_number')) !!}
    {!! Form::text('equipment_number', old('equipment_number', $line->equipment_number), ['class' => 'form-control', 'placeholder' => trans('base::lines.form.equipment_number')]) !!}
    {!! $errors->first('equipment_number', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("equipment_name") ? ' has-error' : '' }}">
    {!! Form::label("equipment_name", trans('base::lines.form.equipment_name')) !!}
    {!! Form::text("equipment_name", old('equipment_name',$line->equipment_name), ['class' => 'form-control', 'placeholder' => trans('base::lines.form.equipment_name')]) !!}
    {!! $errors->first("equipment_name", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("location") ? ' has-error' : '' }}">
    {!! Form::label("location", trans('base::lines.form.location')) !!}
    {!! Form::text("location", old('location', $line->location), ['class' => 'form-control', 'placeholder' => trans('base::lines.form.location')]) !!}
    {!! $errors->first("location", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("serial_number") ? ' has-error' : '' }}">
    {!! Form::label("serial_number", trans('base::lines.form.serial_number')) !!}
    {!! Form::text("serial_number", old('serial_number', $line->serial_number), ['class' => 'form-control', 'placeholder' => trans('base::lines.form.serial_number')]) !!}
    {!! $errors->first("serial_number", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("producer") ? ' has-error' : '' }}">
    {!! Form::label("producer", trans('base::lines.form.producer')) !!}
    {!! Form::text("producer", old('producer', $line->producer), ['class' => 'form-control', 'placeholder' => trans('base::lines.form.producer')]) !!}
    {!! $errors->first("producer", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("manuf_year") ? ' has-error' : '' }}">
    {!! Form::label("manuf_year", trans('base::lines.form.manuf_year')) !!}
    {!! Form::date("manuf_year", old('manuf_year', $line->manuf_year), ['class' => 'form-control', 'placeholder' => trans('base::lines.form.manuf_year')]) !!}
    {!! $errors->first("manuf_year", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("commissioning") ? ' has-error' : '' }}">
    {!! Form::label("commissioning", trans('base::lines.form.commissioning')) !!}
    {!! Form::date("commissioning", old('commissioning', $line->commissioning), ['class' => 'form-control', 'placeholder' => trans('base::lines.form.commissioning')]) !!}
    {!! $errors->first("commissioning", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("sap_inven_number") ? ' has-error' : '' }}">
    {!! Form::label("sap_inven_number", trans('base::lines.form.sap_inven_number')) !!}
    {!! Form::date("sap_inven_number", old('sap_inven_number', $line->sap_inven_number), ['class' => 'form-control', 'placeholder' => trans('base::lines.form.sap_inven_number')]) !!}
    {!! $errors->first("sap_inven_number", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("type") ? ' has-error' : '' }}">
    {!! Form::label("type", trans('base::lines.form.type')) !!}
    {!! Form::text("type", old('type', $line->type), ['class' => 'form-control', 'placeholder' => trans('base::lines.form.type')]) !!}
    {!! $errors->first("type", '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group{{ $errors->has("position") ? ' has-error' : '' }}">
    {!! Form::label("position", trans('base::lines.form.position')) !!}
    {!! Form::text("position", old("position", $line->position), ['class' => 'form-control', 'placeholder' => trans('base::lines.form.position')]) !!}
    {!! $errors->first("position", '<span class="help-block">:message</span>') !!}
</div>
{!! Form::normalTextarea('note', trans('base::lines.form.note'), $errors, $line) !!}



