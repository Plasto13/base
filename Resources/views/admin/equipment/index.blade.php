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
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.base.hall.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('base::halls.button.create hall') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="dd">
                        <ol class="dd-list">
                            <li data-id="0" class="dd-item">
                                <button data-action="collapse" type="button">Collapse</button>
                                <button data-action="expand" type="button" style="display: none;">Expand</button>
                                <div role="group" aria-label="Action buttons" class="btn-group" style="display: none;">
                                </div>
                                <div class="dd-handle-root">root</div>
                                @if($halls)
                                @foreach($halls as $hall)
                                <ol class="dd-list">
                                    <li data-id="{{$hall->id}}" class="dd-item">
                                        @if(!$hall->line()->get()->isEmpty())
                                            <button data-action="collapse" type="button">Collapse</button>
                                            <button data-action="expand" type="button" style="display: none;">Expand</button>
                                        @endif
                                        <div role="group" aria-label="Action buttons" class="btn-group" style="display: inline;">
                                            <a href="{{ route('admin.base.hall.edit',$hall->id) }}" class="btn btn-sm btn-info" style="float: left;">
                                                <i class="fa fa-pencil"></i>
                                            </a> 
                                            <button class="btn btn-sm btn-danger jsDeleteMenuItem" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.base.hall.destroy',$hall->id) }}" title="{{trans('base::halls.destroy resource')}}" style="float: left; margin-right: 15px;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="dd-handle">
                                            {{ $hall->equipment_name}}
                                         </div>
                                         <a href="{{ route('admin.base.line.create',$hall->id) }}" class="btn btn-sm btn-info float-right">
                                                <i class="fa fa-plus"></i>
                                        </a> 
                                         @if($hall->line())
                                         @foreach($hall->line() as $line)
                                         <ol class="dd-list">
                                            <li data-id="2" class="dd-item"><div role="group" aria-label="Action buttons" class="btn-group" style="display: inline;"><a href="http://localhost/sk/backend/menu/menus/1/menuitem/2/edit" class="btn btn-sm btn-info" style="float: left;"><i class="fa fa-pencil"></i></a> <a data-item-id="2" class="btn btn-sm btn-danger jsDeleteMenuItem" style="float: left; margin-right: 15px;"><i class="fa fa-times"></i></a></div><div class="dd-handle"><i class="fa fa-database"></i> Položky</div></li>
                                        </ol>
                                        @endforeach
                                        @endif
                                     </li>
                                 </ol>
                                @endforeach
                                @endif
                             </li>
                         </ol>
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
                    { key: 'c', route: "{{ route('admin.base.hall.create') }}" }
                ]
            });
        });
        $('.dd-list > li button').click(function() {
          $(this).parent().find('.sub').toggle();
          console.log("klik");
        });
    </script>

@endpush
