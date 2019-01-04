@extends('templates.admin.master')
@section('content')
    <div id="content" class="span10">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">@lang('lable.home')</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">@lang('lable.category')</a></li>
        </ul>
        @include('common.admin.error')
        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon white edit"></i><span class="break"></span></h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    {!! Form::open(['method'=> 'get', 'route'=> ['cat.edit', $findCat->cat_id] ]) !!}
                    <fieldset>
                        <div class="control-group">
                            {!! Form::label( 'name', trans('category.category_name'), ['class'=>'control-label']) !!}
                            <div class="controls">
                                {!! Form::text( 'name', $findCat->cname, ['class'=>'span6 typeahead']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label( 'ase', trans('category.kind_of_book'), ['class'=>'control-label']) !!}

                            <div class="controls">
                                {!! Form::select('cat', array(0 => trans('category.select_option'), )+ $listItem, 0) !!}
                            </div>
                        </div>

                        <div class="form-actions">
                            {!! Form::submit( trans('lable.update'), ['class'=>'btn btn-primary']) !!}
                            <button type="reset" class="btn">@lang('lable.cancel')</button>
                        </div>
                    </fieldset>
                    {!! Form::close() !!}
                </div>
            </div><!--/span-->
        </div><!--/row-->
@endsection
