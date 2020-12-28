@extends('dashboard.index')
@section('content')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.js-example-basic-single').select2();

                $(document).on('click', '.copy_product', function () {

                    $.ajax({
                        url: '{{ aurl('products/copy/'.$product->id) }}',
                        dataType: 'json',
                        type: 'post',
                        data: {_token: '{{ csrf_token() }}'},
                        beforeSend: function () {
                            $('.loading_copy').removeClass('d-none');
                            $('.validate_message').html('');
                            $('.error_message').addClass('d-none');
                            $('.success_message').html('').addClass('d-none');

                        }, success: function (data) {
                            if (data.status == true) {
                                $('.loading_copy').addClass('d-none');
                                $('.success_message').html('<h1>' + data.message + '</h1>').removeClass('d-none');
                                setTimeout(function () {
                                    window.location.href = '{{ aurl('products') }}/' + data.id + '/edit';
                                }, 2000);
                            }
                        }, error(response) {
                            $('.loading_copy').addClass('d-none');
                            var error_li = '';
                            $.each(response.responseJSON.errors, function (index, value) {
                                error_li += '<li>' + value + '</li>';
                            });
                            $('.validate_message').html(error_li);
                            $('.error_message').removeClass('d-none');
                        }
                    });
                    return false;
                });

                $(document).on('click', '.save_and_continue', function () {
                    var form_data = $('#product_form').serialize();
                    $.ajax({
                        url: '{{ aurl('products/'.$product->id) }}',
                        dataType: 'json',
                        type: 'post',
                        data: form_data,
                        beforeSend: function () {
                            $('.loading_save_c').removeClass('d-none');
                            $('.validate_message').html('');
                            $('.error_message').addClass('d-none');
                            $('.success_message').html('').addClass('d-none');

                        }, success: function (data) {
                            if (data.status == true) {
                                $('.loading_save_c').addClass('d-none');
                                $('.success_message').html('<h1>' + data.message + '</h1>').removeClass('d-none');
                            }
                        }, error(response) {

                            $('.loading_save_c').addClass('d-none');
                            var error_li = '';
                            $.each(response.responseJSON.errors, function (index, value) {
                                error_li += '<li>' + value + '</li>';
                            });
                            $('.validate_message').html(error_li);
                            $('.error_message').removeClass('d-none');
                        }
                    });
                    return false;
                });
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
            {!! Form::open(['url'=>aurl('products'),'method'=>'put','files'=>true,'id'=>'product_form']) !!}

            <a href="#" class="btn btn-primary save">{{ trans('admin.save') }} <i class="fa fa-floppy-o"></i></a>
            <a href="#" class="btn btn-success save_and_continue">{{ trans('admin.save_and_continue') }} <i
                    class="fa fa-floppy-o"></i>
                <i class="fa fa-spin fa-spinner loading_save_c d-none"></i>
            </a>
            <a href="#" class="btn btn-info copy_product">{{ trans('admin.copy_product') }}
                <i class="fa fa-spin fa-spinner loading_copy d-none"></i>
                <i class="fa fa-copy"></i> </a>
            <a href="#" class="btn btn-danger delete" data-toggle="modal"
               data-target="#del_admin{{ $product->id }}">{{ trans('admin.delete') }} <i class="fa fa-trash"></i></a>
            <hr/>
            <div class="alert alert-danger error_message d-none">
                <ul class="validate_message">

                </ul>
            </div>

            <div class="alert alert-success success_message d-none"></div>


            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                       href="#product_info" role="tab" aria-controls="custom-content-below-home"
                       aria-selected="true">{{ trans('admin.product_info') }} <i class="fa fa-info"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#department"
                       role="tab" aria-controls="custom-content-below-profile"
                       aria-selected="false">{{ trans('admin.department') }} <i class="fa fa-list"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill"
                       href="#product_setting" role="tab" aria-controls="custom-content-below-messages"
                       aria-selected="false">{{ trans('admin.product_setting') }} <i class="fa fa-cog"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#product_media"
                       role="tab" aria-controls="custom-content-below-settings"
                       aria-selected="false">{{ trans('admin.product_media') }} <i class="fa fa-photo"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill"
                       href="#product_size_weight" role="tab" aria-controls="custom-content-below-settings"
                       aria-selected="false">{{ trans('admin.product_size_weight') }} <i class="fa fa-info-circle"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#other_data"
                       role="tab" aria-controls="custom-content-below-settings"
                       aria-selected="false">{{ trans('admin.other_data') }} <i class="fa fa-database"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill"
                       href="#related_product"
                       role="tab" aria-controls="custom-content-below-settings"
                       aria-selected="false">{{ trans('admin.related_product') }} <i class="fa fa-list"></i></a>
                </li>
            </ul>


            <div class="tab-content" id="custom-content-below-tabContent">
                @include('dashboard.page.products.tabs.product_info')
                @include('dashboard.page.products.tabs.department')
                @include('dashboard.page.products.tabs.product_setting')
                @include('dashboard.page.products.tabs.product_media')
                @include('dashboard.page.products.tabs.product_size_weight')
                @include('dashboard.page.products.tabs.other_data')
                @include('dashboard.page.products.tabs.related_product')
            </div>

            <hr/>


            <a href="#" class="btn btn-primary save">{{ trans('admin.save') }} <i class="fa fa-floppy-o"></i></a>
            <a href="#" class="btn btn-success save_and_continue">{{ trans('admin.save_and_continue') }} <i
                    class="fa fa-floppy-o"></i></a>
            <a href="#" class="btn btn-info copy_product">{{ trans('admin.copy_product') }}
                <i class="fa fa-spin fa-spinner loading_copy d-none"></i>
                <i class="fa fa-copy"></i> </a>
            <a href="#" class="btn btn-danger delete" data-toggle="modal"
               data-target="#del_admin{{ $product->id }}">{{ trans('admin.delete') }} <i class="fa fa-trash"></i></a>


            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </section>
    <!-- /.box -->



    <!-- Modal -->
    <div id="del_admin{{ $product->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                </div>
                {!! Form::open(['route'=>['products.destroy',$product->id],'method'=>'delete']) !!}
                <div class="modal-body">
                    <h4>{{ trans('admin.delete_this',['name'=> $product->title]) }}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
