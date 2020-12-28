<span class="btn disabled
{{ $level == 'user'?'btn-info ':'' }}
{{ $level == 'vendor'?'btn-primary':'' }}
{{ $level == 'company'?'btn-success':'' }}
    ">

{{ trans('admin.'.$level) }}
</span>
