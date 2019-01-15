@extends('templates.admin.master')
@section('content')
    @php
        include_once ('../public/function/function.php');
    @endphp
    <div id="content" class="span10">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">@lang('lable.home')</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">@lang('book.book')</a></li>
        </ul>

        <div  class="row-fluid sortable marginbot">
            <div class="span12">
                <a href="{{ route('book.create') }}" class="btn btn-primary">@lang('lable.add')</a>
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
                    <h2><i class="halflings-icon white user"></i><span class="break"></span>@lang('book.book')</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable">
                        <thead>
                        <tr>
                            <th>@lang('book.number')</th>
                            <th >@lang('book.book_name')</th>
                            <th >@lang('book.preview_text')</th>
                            <th >@lang('book.extract')</th>
                            <th>@lang('book.author')</th>
                            <th>@lang('book.kind_of_book')</th>
                            <th>@lang('book.picture')</th>
                            <th>@lang('book.sort')</th>
                            <th>@lang('book.create_by')</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (!$objItemBooks->first())
                            @php
                                $colspan = 8;
                            @endphp
                            <tr class="even pointer">
                                <td class="a-center " colspan="{{ $colspan }}">
                                    <p>@lang('lable.no_data')</p>
                                </td>
                            </tr>
                        @else
                            @foreach($objItemBooks as $key => $objItemBook)
                            <tr>
                                <td>{!! $key !!}</td>
                                <td class="center">{!! $objItemBook->bname !!}</td>
                                <td class="center">{!! substrOfMe($objItemBook->preview_text,100) !!}</td>
                                <td class="center">{!! substrOfMe($objItemBook->extract,150) !!}  <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$objItemBook->book_id}}" >Xem đầy đủ</a></td>
                                <td class="center">{!! $objItemBook->author !!}</td>
                                <td class="center">{!! $objItemBook->cname !!}</td>
                                <td class="center"><img class="picturewh" src="/storage/app/media/files/book/{!! $objItemBook->picture !!}" /></td>
                                <td class="center">{!! $objItemBook->sort !!}</td>
                                <td class="center">{!! $objItemBook->username !!}</td>

                                <td class="center">
                                    <a class="btn btn-info" href="{{route('book.show', ['id'=>$objItemBook->book_id ])}}">
                                        <i class=" ">@lang('lable.update')</i>
                                    </a>
                                        {{ Form::open(array('route' => array('book.destroy', $objItemBook->book_id) , 'method' => 'delete' , 'onsubmit' => 'confirm("you sure")')) }}
                                        {!! Form::submit( trans('lable.delete'), ['class'=>'btn btn-danger']) !!}
                                        {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div><!--/span-->
            <!-- Modal -->
            @foreach($objItemBooks as $objItemBook)
            <div class="modal fade" id="myModal{{$objItemBook->book_id}}" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{!! $objItemBook->bname !!}</h4>
                        </div>
                        <div class="modal-body">
                            <p>{!! $objItemBook->extract !!}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            <!-- End Modal -->
        </div><!--/row-->
@endsection
