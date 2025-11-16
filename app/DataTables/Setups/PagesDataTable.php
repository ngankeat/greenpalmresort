<?php

namespace App\DataTables\Setups;

use App\Models\Page;
use App\Models\Setups\Pages;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PagesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('icon', function ($module) {
                return '<i data-lucide="'.$module->icon.'"></i>';
            })
            ->editColumn('soft_delete', function ($soft_delete) {
                $active = (is_null($soft_delete->deleted_at)) ? '<span class="badge badge-success">'.__("label.button.active").'</span>' : '<span class="badge badge-danger">'.__("label.button.deleted").'</span>';
                return $active;
            })
            ->addColumn('action', function ($module) {
                return view('setups::pages.action', ['module' => $module]);
            })
            ->rawColumns(['soft_delete', 'icon']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pages $model, Request $request): QueryBuilder
    {
        $model = $model->newQuery();
        if ($request->cateId) {
            $model->where("module_id", $request->cateId);
        }
        if ($request->soft_delete) {
            if ($request->soft_delete == '1') {
                $model->where('deleted_at', null);
            } elseif ($request->soft_delete == '2') {
                $model->where('deleted_at', '!=', null);
            }
        }
        $model->leftJoin('modules', 'pages.module_id', 'modules.id');
        $model->withTrashed();
        $model->select([
            'pages.id',
            'pages.module_id',
            'pages.name',
            'pages.name_kh',
            'pages.slug',
            'pages.icon',
            'pages.default_action',
            'pages.order',
            'pages.deleted_at',
            'modules.name_kh AS MKH']);
        return $model;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('moduledatatable')
            ->dom("<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>><'table-responsive'tr><'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>")
            ->columns($this->getColumns())
            ->ajax([
                'data' => 'function(d) {
                    d.cateId = $("#inlineFormSelectCate").val();
                    d.soft_delete = $("#inlineFormSelectStatus").val();
                }'
            ])
            ->parameters([
                'oLanguage' => [
                    "oPaginate" => [
                        "sPrevious" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    ],
                    "sInfo" => __('label.table.showing.page') . " _PAGE_ of _PAGES_",
                ]
            ])
            ->drawCallback("function () {lucide.createIcons();}")
            ->initComplete('function () {
                $("#filter").submit(function(event) {
                    event.preventDefault();
                    $("#moduledatatable").DataTable().ajax.reload();
                });
                var tr = document.createElement("tr");
                var columns = this.api().init().columns;
                this.api().columns().every(function (index) {
                    var column = this;
                    var td = document.createElement("td");
                    if (columns[index] && columns[index].searchable) {
                        var input = document.createElement("input");
                        input.className = "form-control form-control-sm";
                        $(input).on("change", function () {
                            column.search($(this).val(), false, false, true).draw();
                        }).appendTo(td);
                    }
                    $(td).appendTo(tr);
                });
                $(".table-responsive table thead").append(tr);
            }')
            ->orderBy(5, 'ASC');
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex', __('label.table.th.no'))->width(30)->addClass('text-center'),
            Column::computed('icon')->title(__('label.table.th.icon'))->width(50)->addClass('text-center'),
            Column::make('name')->title(__('label.table.th.pages')),
            Column::make('name_kh')->title(__('label.table.th.pages.kh')),
            Column::make('MKH')->title(__('label.table.th.modules')),
            Column::make('order')->title(__('label.table.th.order'))->addClass('text-center'),
            Column::computed('soft_delete')->title(__('label.table.th.status'))->width(60)->addClass('text-center'),
            Column::computed('action', __('label.table.th.action'))->exportable(false)->printable(false)->width(50)->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pages_' . date('YmdHis');
    }
}
