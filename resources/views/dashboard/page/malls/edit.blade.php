@extends('dashboard.index')
@section('content')

 @push('js')
     <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
 <script type="text/javascript" src='{{ url('design/dashboard/dist/js/locationpicker.jquery.js') }}'></script>
<?php
    $lat = !empty($mall->lat) ? $mall->lat : '30.034024628931657';
    $lng = !empty($mall->lng) ? $mall->lng : '31.24238681793213';

?>
 <script>
  $('#us1').locationpicker({
      location: {
          latitude: {{ $lat }},
          longitude:{{ $lng }}
      },
      radius: 300,
      markerIcon: '{{ url('design/dashboard/dist/img/map-marker-2-xl.png') }}',
      inputBinding: {
        latitudeInput: $('#lat'),
        longitudeInput: $('#lng'),
       // radiusInput: $('#us2-radius'),

      },
      enableAutocomplete: true

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
    {!! Form::open(['url'=>aurl('malls/'.$mall->id),'method'=>'put','files'=>true ]) !!}
      <input type="hidden" value="{{ $lat }}" id="lat" name="lat">
    <input type="hidden" value="{{ $lng }}" id="lng" name="lng">
   <div class="form-group">
        {!! Form::label('name_ar',trans('admin.name_ar')) !!}
        {!! Form::text('name_ar',$mall->name_ar,['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('name_en',trans('admin.name_en')) !!}
        {!! Form::text('name_en',$mall->name_en,['class'=>'form-control']) !!}
     </div>



     <div class="form-group">
        {!! Form::label('contact_name',trans('admin.contact_name')) !!}
        {!! Form::text('contact_name',$mall->contact_name,['class'=>'form-control']) !!}
     </div>



     <div class="form-group">
        {!! Form::label('email',trans('admin.email')) !!}
        {!! Form::email('email',$mall->email,['class'=>'form-control']) !!}
     </div>




     <div class="form-group">
        {!! Form::label('mobile',trans('admin.mobile')) !!}
        {!! Form::text('mobile',$mall->mobile,['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('address',trans('admin.address')) !!}
        {!! Form::text('address',$mall->address,['class'=>'form-control address']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('country_id',trans('admin.country_id')) !!}
        {!! Form::select('country_id',App\Models\Country::pluck('country_name_'.app()->getLocale(),'id'),old('country_id'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
       <div id="us1" style="width: 100%; height: 400px;"></div>
     </div>




     <div class="form-group">
        {!! Form::label('facebook',trans('admin.facebook')) !!}
        {!! Form::text('facebook',$mall->facebook,['class'=>'form-control']) !!}
     </div>


     <div class="form-group">
        {!! Form::label('twitter',trans('admin.twitter')) !!}
        {!! Form::text('twitter',$mall->twitter,['class'=>'form-control']) !!}
     </div>






     <div class="form-group">
        {!! Form::label('icon',trans('admin.mall_icon')) !!}
        {!! Form::file('icon',['class'=>'form-control']) !!}

          @if(!empty($mall->icon))
       <img src="{{ asset('uploads/malls/'.'/'.$mall->icon) }}" style="width:50px;height: 50px;" />
      @endif

     </div>



     {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</section>
<!-- /.box -->



@endsection
