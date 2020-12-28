@extends('dashboard.index')
@section('content')
    @push('js')
        <div id="delete_bootstrap_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                    </div>
                    {!! Form::open(['url'=>'','method'=>'delete','id'=>'form_Delete_department']) !!}
                    <div class="modal-body">
                        <h4>
                            {{ trans('admin.ask_delete_dep') }} <span id="dep_name"></span>
                        </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.close') }}</button>
                        {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>

        <script>
            $(document).ready(function () {

                $('#jstree').jstree({
                    "core": {
                        'data': {!! load_dep('parent') !!},
                        "themes": {
                            "variant": "large"
                        }
                    },
                    "checkbox": {
                        "keep_selected_style": true
                    },
                    "plugins": ["wholerow"]
                });

            });
            $('#jstree').on('changed.jstree',function(e,data){
                var i , j , r = [];
                var  name = [];
                for(i=0,j = data.selected.length;i < j;i++)
                {
                    r.push(data.instance.get_node(data.selected[i]).id);
                    name.push(data.instance.get_node(data.selected[i]).text);
                }
                $('#form_Delete_department').attr('action','{{ aurl('department') }}/'+r.join(', '));
                $('.parent_id').val(r.join(', '));
                if(r.join(', ') != '')
                {
                    $('.showbtn_control').removeClass('invisible ');
                    $('.edit_dep').attr('href','{{ aurl('department') }}/'+r.join(', ')+'/edit');
                }else{
                    $('.showbtn_control').addClass('invisible ');
                }
            });

        </script>
    @endpush
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$title}}</h1>
                </div><!-- /.col -->
                <a href="" class="btn btn-info edit_dep showbtn_control invisible " ><i class="fa fa-edit"></i> {{ trans('admin.edit') }}</a>
                <a href="" class="btn btn-danger delete_dep showbtn_control invisible "  data-toggle="modal" data-target="#delete_bootstrap_modal" ><i class="fa fa-trash"></i> {{ trans('admin.delete') }}</a>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <div id="jstree">

            </div>
            <input type="hidden" name="parent" class="parent_id" value="">

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



@stop
