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
    <section class="content">
        <div class="container-fluid">
            {!! Form::open(['url'=>route('state.store'),'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('state_name_ar',trans('admin.state_name_ar')) !!}
                {!! Form::text('state_name_ar',old('state_name_ar'),['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('state_name_en',trans('admin.state_name_en')) !!}
                {!! Form::text('state_name_en',old('state_name_en'),['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('country_id',trans('admin.country_id')) !!}
                {!! Form::select('country_id',App\Models\Country::pluck('country_name_'.app()->getLocale(),'id'),old('country_id'),['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('city_id',trans('admin.city_id')) !!}
                {!! Form::select('city_id',App\Models\City::pluck('city_name_'.app()->getLocale(),'id'),old('city_id'),['class'=>'form-control']) !!}
            </div>

            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </section>
    <!-- /.box-body -->
    <!-- /.box -->



@endsection
