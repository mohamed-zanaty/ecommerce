@extends('dashboard.index')
@section('content')

    @push('js')
        <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>

        <script type="text/javascript" src='{{ url('design/dashboard/dist/js/locationpicker.jquery.js') }}'></script>
        <?php
        $lat = !empty(old('lat')) ? old('lat') : '30.034024628931657';
        $lng = !empty(old('lng')) ? old('lng') : '31.24238681793213';

        ?>
        <script>
            $('#us1').locationpicker({
                location: {
                    latitude: {{ $lat }},
                    longitude:{{ $lng }}
                },
                radius: 300,
                markerIcon: 'https://maps.google.com/mapfiles/kml/shapes/',
                inputBinding: {
                    latitudeInput: $('#lat'),
                    longitudeInput: $('#lng'),
                    // radiusInput: $('#us2-radius'),

                }

            });
        </script>
    @endpush


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
            {!! Form::open(['url'=>aurl('manufacturers'),'files'=>true]) !!}
            <input type="hidden" value="{{ $lat }}" id="lat" name="lat">
            <input type="hidden" value="{{ $lng }}" id="lng" name="lng">
            <div class="form-group">
                {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name_en',trans('admin.name_en')) !!}
                {!! Form::text('name_en',old('name_en'),['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('contact_name',trans('admin.contact_name')) !!}
                {!! Form::text('contact_name',old('contact_name'),['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('mobile',trans('admin.mobile')) !!}
                {!! Form::text('mobile',old('mobile'),['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('address',trans('admin.address')) !!}
                {!! Form::text('address',old('address'),['class'=>'form-control address']) !!}
            </div>
            <div class="form-group">
                <div id="us1" style="width: 100%; height: 400px;"></div>
            </div>


            <div class="form-group">
                {!! Form::label('facebook',trans('admin.facebook')) !!}
                {!! Form::text('facebook',old('facebook'),['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('twitter',trans('admin.twitter')) !!}
                {!! Form::text('twitter',old('twitter'),['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('icon',trans('admin.manufacturers_icon')) !!}
                {!! Form::file('icon',['class'=>'form-control']) !!}
            </div>


            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </section>



@endsection
