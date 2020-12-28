@extends('dashboard.index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {!! Form::open(['id'=>'form_data','url'=>route('user.destroy.all'),'method'=>'delete']) !!}
            {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover  table-bordered'],true) !!}
            {!! Form::close() !!}
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    {{--    modal for delete--}}
    <div id="mutlipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('user.delete') }}</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger">
                        <div class="empty_record invisible">
                            <h4>{{ trans('user.please_check_some_records') }} </h4>
                        </div>
                        <div class="not_empty_record invisible">
                            <h4>{{ trans('user.ask_delete_itme') }} <span class="record_count"></span> ? </h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record invisible">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('user.close') }}</button>
                    </div>
                    <div class="not_empty_record invisible">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('user.no') }}</button>
                        <input type="submit"  value="{{ trans('user.yes') }}"  class="btn btn-danger del_all" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>


            delete_all();
            submit_delete();
        </script>
        {!! $dataTable->scripts() !!}
    @endpush
@stop