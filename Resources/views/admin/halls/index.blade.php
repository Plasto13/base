@extends('layouts.master')

@push('css-stack')
    <link href="{!! Module::asset('base:css/nestable.css') !!}" rel="stylesheet" type="text/css" />
@endpush

@section('content-header')
    <h1>
        {{ trans('base::halls.title.halls') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('base::halls.title.halls') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-6">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.base.hall.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('base::halls.button.create hall') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary" style="overflow: hidden;">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="dd">
                       
                                @if($halls)
                                @foreach($halls as $hall)
                                <ol class="dd-list" id="hall{{$hall->id}}">
                                    <li data-hall-id="{{$hall->id}}" class="dd-item" >
                                        <button data-action="collapse" type="button" class="collpase" data-target="#hall{{$hall->id}}">Collapse</button>
                                        <div role="group" aria-label="Action buttons" class="btn-group" style="display: inline;">
                                            <a href="{{ route('admin.base.hall.edit',$hall->id) }}" class="btn btn-sm btn-info" style="float: left;">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin.base.line.create',$hall->id) }}" class="btn btn-sm btn-primary" style="float: left;margin-right: 15px">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger jsDeleteMenuItem" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.base.hall.destroy',$hall->id) }}" title="{{trans('base::halls.destroy resource')}}" style="float: right;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="dd-handle">
                                            {{ $hall->equipment_name}}
                                         </div>
                                        @if($lines = $hall->line()->get())
                                        @foreach($lines as $line)
                                        <ol class="dd-list sub"  style="display: none;">
                                            <li data-line-id="{{ $line->id}}" class="dd-item">
                                                <div role="group" aria-label="Action buttons" class="btn-group" style="display: inline;">
                                                    <a href="{{ route('admin.base.line.edit', [$hall->id, $line->id]) }}" class="btn btn-sm btn-info" style="float: left;">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('admin.base.equipment.create',[$hall->id, $line->id]) }}" class="btn btn-sm btn-primary" style="float: left;margin-right: 15px">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-danger jsDeleteMenuItem" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.base.line.destroy', [$hall->id, $line->id]) }}" title="{{trans('base::lines.destroy resource')}}" style="float: right;">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                                <div class="dd-handle">
                                                    {{ $line->equipment_name}}
                                                </div>
                                            </li>
                                            @if($equipments = $line->equipment()->get())
                                            @foreach($equipments as $equipment)
                                            <ol class="dd-list">
                                                <li data-line-id="{{ $equipment->id}}" class="dd-item">
                                                    <div role="group" aria-label="Action buttons" class="btn-group" style="display: inline;">
                                                        <a href="{{ route('admin.base.equipment.edit', [$hall->id, $line->id, $equipment->id]) }}" class="btn btn-sm btn-info" style="float: left;margin-right: 15px">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger jsDeleteMenuItem" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.base.equipment.destroy', [$hall->id, $line->id, $equipment->id]) }}" title="{{trans('base::equipment.destroy resource')}}" style="float: right;">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    <div class="dd-handle">
                                                        {{ $equipment->equipment_name}}</div></li>
                                            </ol>
                                            @endforeach
                                            @endif
                                        </ol>
                                        @endforeach
                                        @endif
                                    </li>
                                </ol>
                                @endforeach
                                @endif
                            
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('base::halls.title.create hall') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                ]
            });
        $('.dd-list > li button.collpase').click(function() {
          $(this).parent().find('.sub').toggle();
          console.log("klik");
        });
        });
    </script>
@endpush
