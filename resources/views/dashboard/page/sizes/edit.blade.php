@extends('dashboard.index')
@section('content')

    @push('js')
        <!-- Trigger the modal with a button -->
        <script type="text/javascript">
            $(document).ready(function () {

                $('#jstree').jstree({
                    "core": {
                        'data': {!! load_dep($size->department_id) !!},
                        "themes": {
                            "variant": "large"
                        }
                    },
                    "checkbox": {
                        "keep_selected_style": true
                    },
                    "plugins": ["wholerow"]//checkbox
                });

            });

            $('#jstree').on('changed.jstree', function (e, data) {
                var i, j, r = [];
                var name = [];
                for (i = 0, j = data.selected.length; i < j; i++) {
                    r.push(data.instance.get_node(data.selected[i]).id);
                }

                if (r.join(', ') != '') {
                    $('.department_id').val(r.join(', '));
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
            {!! Form::open(['url'=>aurl('sizes/'.$size->id),'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                {!! Form::text('name_ar',$size->name_ar,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name_en',trans('admin.name_en')) !!}
                {!! Form::text('name_en',$size->name_en,['class'=>'form-control']) !!}
            </div>
            <input type="hidden" name="department_id" class="department_id" value="{{ $size->department_id }}">
            <div id="jstree"></div>
            <div class="form-group">
                {!! Form::label('is_public',trans('admin.is_public')) !!}
                {!! Form::select('is_public',['yes'=>trans('admin.yes'),'no'=>trans('admin.no')],$size->is_public,['class'=>'form-control']) !!}
            </div>
            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </section>
    <!-- /.box -->
@endsection
