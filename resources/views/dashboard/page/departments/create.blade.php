@extends('dashboard.index')
@section('content')
    @push('js')
        <script type="text/javascript">
            $(document).ready(function(){

                $('#jstree').jstree({
                    "core" : {
                        'data' : {!! load_dep('parent') !!},
                        "themes" : {
                            "variant" : "large"
                        }
                    },
                    "checkbox" : {
                        "keep_selected_style" : false
                    },
                    "plugins" : [ "wholerow" ]
                });

            });

            $('#jstree').on('changed.jstree',function(e,data){
                var i , j , r = [];
                for(i=0,j = data.selected.length;i < j;i++)
                {
                    r.push(data.instance.get_node(data.selected[i]).id);
                }
                $('.parent_id').val(r.join(', '));
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
            {!! Form::open(['url'=>route('department.store'),'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('dep_name_ar',trans('admin.dep_name_ar')) !!}
                {!! Form::text('dep_name_ar',old('dep_name_ar'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('dep_name_en',trans('admin.dep_name_en')) !!}
                {!! Form::text('dep_name_en',old('dep_name_en'),['class'=>'form-control']) !!}
            </div>
            <div class="clearfix"></div>
            <div id="jstree"></div>
            <input type="hidden" name="parent" class="parent_id" value="{{ old('parent') }}">
            <div class="clearfix"></div>
            <div class="form-group">
                {!! Form::label('description',trans('admin.description')) !!}
                {!! Form::textarea('description',old('description'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('keyword',trans('admin.keyword')) !!}
                {!! Form::textarea('keyword',old('keyword'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('icon',trans('admin.icon')) !!}
                {!! Form::file('icon',['class'=>'form-control']) !!}
            </div>
            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </section>
    <!-- /.box-body -->
    <!-- /.box -->



@endsection