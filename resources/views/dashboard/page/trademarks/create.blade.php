@extends('dashboard.index')
@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$title}}</h1>
                </div><!-- /.col -->
                {{--                <div class="col-sm-6">--}}
                {{--                    <ol class="breadcrumb float-sm-right">--}}
                {{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                {{--                        <li class="breadcrumb-item active">Dashboard v1</li>--}}
                {{--                    </ol>--}}
                {{--                </div><!-- /.col -->--}}
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.box-header -->
    <!-- /.box-header -->
    <section class="content">
        <div class="container-fluid">
            {!! Form::open(['url'=>aurl('trademarks'),'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name_en',trans('admin.name_en')) !!}
                {!! Form::text('name_en',old('name_en'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('logo',trans('admin.trade_icon')) !!}
                {!! Form::file('logo',['class'=>'form-control']) !!}
            </div>


            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </section>
    <!-- /.box-body -->

    <!-- /.box -->



@endsection
