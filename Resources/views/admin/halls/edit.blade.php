@extends('layouts.master')

@section('content-header')
<h1>
    {{ trans('base::halls.titles.edit hall item') }}
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li><a href="{{ route('admin.base.hall.index') }}">{{ trans('base::halls.title.halls') }}</a></li>
    <li>{{ trans('base::halls.breadcrumb.edit item') }}</li>
</ol>
@stop

@section('content')
{!! Form::open(['route' => ['admin.base.hall.update', $hall->id], 'method' => 'put']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans('core::core.title.non translatable fields') }}</h3>
            </div>
            <div class="box-body">
                @include('base::admin.halls.partials.edit-fields')
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
            <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.base.hall.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index', ['name' => 'hall']) }}</dd>
    </dl>
@stop

@push('js-stack')
<script>
$( document ).ready(function() {
    $(document).keypressAction({
        actions: [
            { key: 'b', route: "{!! route('admin.base.hall.index') !!}" }
        ]
    });
});
</script>
@endpush
