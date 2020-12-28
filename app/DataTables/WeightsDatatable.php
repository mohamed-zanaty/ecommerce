<?php

namespace App\DataTables;

use App\Models\Weight;
use Yajra\DataTables\Services\DataTable;

class WeightsDatatable extends DataTable
{
   /**
    * Build DataTable class.
    *
    * @param mixed $query Results from query() method.
    * @return \Yajra\DataTables\DataTableAbstract
    */
   public function dataTable($query)
   {
      return datatables($query)
         ->addColumn('checkbox', 'dashboard.page.weights.btn.checkbox')
         ->addColumn('edit', 'dashboard.page.weights.btn.edit')
         ->addColumn('delete', 'dashboard.page.weights.btn.delete')
         ->rawColumns([
            'edit',
            'delete',
            'color',
            'checkbox',
         ]);
   }

   /**
    * Get query source of dataTable.
    *
    * @param \App\User $model
    * @return \Illuminate\Database\Eloquent\Builder
    */
   public function query()
   {
      return Weight::query();
   }

   /**
    * Optional method if you want to use html builder.
    *
    * @return \Yajra\DataTables\Html\Builder
    */
   public function html()
   {
      return $this->builder()
         ->columns($this->getColumns())
         ->minifiedAjax()
         ->parameters([
            'dom'          => 'Blfrtip',
            'lengthMenu'   => [[10, 25, 50, 100], [10, 25, 50, trans('admin.all_record')]],
             'buttons'    => [
                 [
                     'text' => '<i class="fa fa-plus"></i> '.trans('admin.add'), 'className' => 'btn btn-info', "action" => "function(){

							window.location.href = '".\URL::current()."/create';
						}"],

                 ['extend' => 'print', 'className' => 'btn btn-primary'],
                 ['extend' => 'csv', 'className' => 'btn btn-primary'],
                 ['extend' => 'reset', 'className' => 'btn btn-success'],
                 ['extend' => 'reload', 'className' => 'btn btn-default'],
                 [
                     'text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn'],

             ],
            'initComplete' => " function () {
		            this.api().columns([2,3]).every(function () {
		                var column = this;
		                var input = document.createElement(\"input\");
		                $(input).appendTo($(column.footer()).empty())
		                .on('keyup', function () {
		                    column.search($(this).val(), false, false, true).draw();
		                });
		            });
		        }",

             'language'         => [
                 'sProcessing'     => trans('admin.sProcessing'),
                 'sLengthMenu'     => trans('admin.sLengthMenu'),
                 'sZeroRecords'    => trans('admin.sZeroRecords'),
                 'sEmptyTable'     => trans('admin.sEmptyTable'),
                 'sInfo'           => trans('admin.sInfo'),
                 'sInfoEmpty'      => trans('admin.sInfoEmpty'),
                 'sInfoFiltered'   => trans('admin.sInfoFiltered'),
                 'sInfoPostFix'    => trans('admin.sInfoPostFix'),
                 'sSearch'         => trans('admin.sSearch'),
                 'sUrl'            => trans('admin.sUrl'),
                 'sInfoThousands'  => trans('admin.sInfoThousands'),
                 'sLoadingRecords' => trans('admin.sLoadingRecords'),
                 'oPaginate'       => [
                     'sFirst'         => trans('admin.sFirst'),
                     'sLast'          => trans('admin.sLast'),
                     'sNext'          => trans('admin.sNext'),
                     'sPrevious'      => trans('admin.sPrevious'),
                 ],
                 'oAria'            => [
                     'sSortAscending'  => trans('admin.sSortAscending'),
                     'sSortDescending' => trans('admin.sSortDescending'),
                 ],

             ],

         ]);
   }

   /**
    * Get columns.
    *
    * @return array
    */
   protected function getColumns()
   {
      return [
         [
            'name'       => 'checkbox',
            'data'       => 'checkbox',
            'title'      => '<input type="checkbox" class="check_all" onclick="check_all()" />',
            'exportable' => false,
            'printable'  => false,
            'orderable'  => false,
            'searchable' => false,
         ], [
            'name'  => 'id',
            'data'  => 'id',
            'title' => '#',
         ], [
            'name'  => 'name_ar',
            'data'  => 'name_ar',
            'title' => trans('admin.name_ar'),
         ], [
            'name'  => 'name_en',
            'data'  => 'name_en',
            'title' => trans('admin.name_en'),
         ], [
            'name'  => 'created_at',
            'data'  => 'created_at',
            'title' => trans('admin.created_at'),
         ], [
            'name'  => 'updated_at',
            'data'  => 'updated_at',
            'title' => trans('admin.updated_at'),
         ], [
            'name'       => 'edit',
            'data'       => 'edit',
            'title'      => trans('admin.edit'),
            'exportable' => false,
            'printable'  => false,
            'orderable'  => false,
            'searchable' => false,
         ], [
            'name'       => 'delete',
            'data'       => 'delete',
            'title'      => trans('admin.delete'),
            'exportable' => false,
            'printable'  => false,
            'orderable'  => false,
            'searchable' => false,
         ],

      ];
   }

   /**
    * Get filename for export.
    *
    * @return string
    */
   protected function filename()
   {
      return 'weights_' . date('YmdHis');
   }
}
