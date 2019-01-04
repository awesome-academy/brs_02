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

        <div>" class="row-fluid sortable">
            <div class="span12">
                <a href="{{ route('cat.create') }}" class="btn btn-primary">@lang('lable.add')</a>
            </div>
        </div>
        @if (Session::has('msg'))
            <div>
                <strong>{{ Session::get('msg') }}</strong>
            </div>
        @endif
        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon white user"></i><span class="break"></span>@lang('lable.category')</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                    </div>
                </div>
                <a class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <thead>
                        <tr>
                            <th>@lang('lable.number')</th>
                            <th>@lang('category.category_name')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (!$objItemCats->first())
                            @php
                                $colspan = 8;
                            @endphp
                            <tr class="even pointer">
                                <td class="a-center " colspan="{{ $colspan }}">
                                    <p>@lang('lable.no_data')</p>
                                </td>
                            </tr>
                        @else
                            @foreach($objItemCats as $key => $objItemCat)
                                <tr>
                                    <td>{!! $key !!}</td>
                                    <td class="center">{!! $objItemCat->cname !!}</td>
                                    <td class="center">
                                        <a class="btn btn-info" href="{{route('cat.show', $objItemCat->cat_id)}}">
                                            <i class=" ">@lang('lable.update')</i>
                                        </a>
                                        <a>
                                            {{ Form::open(array('route' => array('cat.destroy', $objItemCat->cat_id), 'method' => 'delete')) }}
                                            {!! Form::submit( trans('lable.delete'), ['class'=>'btn btn-danger']) !!}
                                            {{ Form::close() }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection
