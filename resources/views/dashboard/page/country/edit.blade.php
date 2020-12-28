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
            {!! Form::open(['url'=>route('country.update',$country->id),'method'=>'put','files'=>true ]) !!}
            <div class="form-group">
                {!! Form::label('country_name_ar',trans('admin.country_name_ar')) !!}
                {!! Form::text('country_name_ar',$country->country_name_ar,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('country_name_en',trans('admin.country_name_en')) !!}
                {!! Form::text('country_name_en',$country->country_name_en,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('code',trans('admin.code')) !!}
                {!! Form::text('code',$country->code,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('mob',trans('admin.mob')) !!}
                {!! Form::text('mob',$country->mob,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('currency',trans('admin.currency')) !!}
                {!! Form::text('currency',$country->currency,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('logo',trans('admin.country_flag')) !!}
                {!! Form::file('logo',['class'=>'form-control']) !!}

                @if(!empty($country->logo))
                    <img src="{{ $country->image_path }}" style="width:50px;height: 50px;" />
                @endif

            </div>



            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </section>
    <!-- /.box-body -->
    <!-- /.box -->



@endsection
