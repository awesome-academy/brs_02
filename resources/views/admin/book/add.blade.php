@extends('templates.admin.master')
@section('content')
    <div id="content" class="span10">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">@lang('lable.home')</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">@lang('book.book')</a></li>
        </ul>
        @include('common.admin.error')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break">@lang('book.book')</span></h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                {!! Form::open(['method'=> 'POST', 'route'=> ['book.store'], 'files' => 'true']) !!}
                    <fieldset>
                        <div class="control-group">
                            {!! Form::label( 'name', trans('book.book_name'), ['class'=>'control-label']) !!}
                            <div class="controls">
                                {!! Form::text( 'bname', old('bname'), ['class'=>'span6 typeahead']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label( 'name', trans('book.preview_text'), ['class'=>'control-label']) !!}
                            <div class="controls">
                                {!! Form::text( 'preview', old('preview'), ['class'=>'span6 typeahead']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label( 'name', trans('book.author'), ['class'=>'control-label']) !!}
                            <div class="controls">
                                {!! Form::text( 'author', old('author'), ['class'=>'span6 typeahead']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label( 'ase', trans('category.kind_of_book'), ['class'=>'control-label']) !!}
                            <div class="controls">
                                {!! Form::select('cat', array(0 => trans('category.select_option'), )+ $listItem, 0) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label( 'name', trans('book.picture'), ['class'=>'control-label']) !!}
                            <div class="controls">
                                {!! Form::file('picture')  !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label( 'name', trans('book.sort'), ['class'=>'control-label']) !!}
                            <div class="controls">
                                {!! Form::number( 'sort', old('sort'), ['class'=>'span6 typeahead']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label( 'name', trans('book.extract'), ['class'=>'control-label']) !!}
                            <div class="controls">
                                {!! Form::textarea('extract', null, ['class'=>'ckeditor']) !!}
                            </div>
                        </div>

                        <div class="form-actions">
                            {!! Form::submit( trans('lable.add'), ['class'=>'btn btn-primary']) !!}
                        </div>
                    </fieldset>
                {!! Form::close() !!}

            </div>
        </div><!--/span-->
    </div><!--/row-->
@endsection
