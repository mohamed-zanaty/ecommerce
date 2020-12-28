<?php

namespace App\DataTables;

use App\Models\City;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CityDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('checkbox', 'dashboard.page.city.btn.checkbox')
            ->addColumn('edit', 'dashboard.page.city.btn.edit')
            ->addColumn('delete', 'dashboard.page.city.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
            ]);
    }


    public function query()
    {
        return City::query()->with('country')->select('cities.*');
    }


    public function html()
    {
        return $this->builder()
            ->setTableId('admindatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 'All Record']],
                'buttons' => [

                    ['extend' => 'print', 'className' => 'btn btn-primary'],
                    ['extend' => 'csv', 'className' => 'btn btn-primary'],
                    ['extend' => 'reset', 'className' => 'btn btn-success'],
                    ['extend' => 'reload', 'className' => 'btn btn-default'],
                    ['text' => '<i class="fa fa-trash">','className'=>'btn btn-danger delBtn'],


                ],
                'initComplete' => "function () {
            this.api().columns([1,2,3]).every(function () {
                var column = this;
                var input = document.createElement(\"input\");
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column.search(val ? val : '', true, false).draw();
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
                'name'  => 'city_name_ar',
                'data'  => 'city_name_ar',
                'title' => trans('admin.city_name_ar'),
            ],

            [
                'name'  => 'city_name_en',
                'data'  => 'city_name_en',
                'title' => trans('admin.city_name_en'),
            ],
            [
                'name'  => 'country.country_name_'.app()->getLocale(),
                'data'  => 'country.country_name_'.app()->getLocale(),
                'title' => trans('admin.country_name_en'),
            ],

            [
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
    protected function filename() {
        return 'cities_'.date('YmdHis');
    }

}
