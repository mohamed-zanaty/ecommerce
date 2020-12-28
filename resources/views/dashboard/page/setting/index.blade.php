@extends('dashboard.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$title}}</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {!! Form::open(['url'=>route('setting.save'),'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('sitename_ar',trans('admin.sitename_ar')) !!}
                {!! Form::text('sitename_ar',$setting->sitename_ar,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sitename_en',trans('admin.sitename_en')) !!}
                {!! Form::text('sitename_en',$setting->sitename_en,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',$setting->email,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('logo',trans('admin.logo')) !!}
                {!! Form::file('logo',$setting->logo,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description',trans('admin.description')) !!}
                {!! Form::textarea('description',$setting->description,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('keywords',trans('admin.keywords')) !!}
                {!! Form::textarea('keywords',$setting->keywords,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('main_lang',trans('admin.main_lang')) !!}
                {!! Form::select('main_lang',['ar'=>trans('admin.ar'),'en'=>trans('admin.en')],$setting->main_lang,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status',trans('admin.status')) !!}
                {!! Form::select('status',['open'=>trans('admin.open'),'close'=>trans('admin.close')],$setting->status,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('message_maintenance',trans('admin.message_maintenance')) !!}
                {!! Form::textarea('message_maintenance',$setting->message_maintenance,['class'=>'form-control']) !!}
            </div>
            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@stop
