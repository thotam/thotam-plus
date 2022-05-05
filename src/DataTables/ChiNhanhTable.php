<?php

namespace Thotam\ThotamPlus\DataTables;

use Auth;
use Carbon\Carbon;
use Thotam\ThotamHr\Models\HR;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;
use Thotam\ThotamPlus\Models\ChiNhanh;

class ChiNhanhTable extends DataTable
{
    public $hr, $table_id;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->hr = Auth::user()->hr;
        $this->table_id = "cpc1hn-chinhanh-table";
    }

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->filter(function ($query) {
                if (!!request('name_filter')) {
                    $query->where('chinhanhs.name', 'like', '%' . request('name_filter') . '%');
                }

                if (request('active_filter') !== NULL && request('active_filter') != -999) {
                    if (request('active_filter') == 1) {
                        $query->where('chinhanhs.active', true);
                    } else {
                        $query->where('chinhanhs.active', false);
                    }
                }

                if (!!request('tag_filter')) {
                    $query->where('chinhanhs.tag', 'like', '%' . request('tag_filter') . '%');
                }

                if (!!request('giamdoc_filter')) {
                    $query->whereHas('giamdocs', function ($query2) {
                        $query2->where('hrs.hoten', 'like', '%' . request('giamdoc_filter') . '%');
                        $query2->orWhere('hrs.key', 'like', '%' . request('giamdoc_filter') . '%');
                    });
                }
            }, true)
            ->editColumn('active', function ($query) {
                if (!!$query->active) {
                    return "<span class='badge badge-success'>Activating</span>";
                } else {
                    return "<span class='badge badge-danger'>Deleted</span>";
                }
            })
            ->addColumn('action', function ($query) {
                return view('thotam-plus::chinhanh.table-actions.chinhanh-table-actions', ['chinhanh' => $query, 'hr' => $this->hr]);
            })
            ->addColumn('ghichu', function ($query) {
                return null;
            })
            ->addColumn('giamdoc', function ($query) {
                return $query->giamdocs->pluck('hoten')->implode(', ');
            })
            ->rawColumns(['action', 'active', 'hoithao', 'hoithao_batbuoc']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Thotam\ThotamPlus\Models\ChiNhanh $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ChiNhanh $model)
    {
        $query = $model->newQuery();

        if (!request()->has('order')) {
            $query->orderBy('chinhanhs.id', 'asc');
        };

        return $query->with(['giamdocs']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId($this->table_id)
            ->columns($this->getColumns())
            ->minifiedAjax("", NULL, [
                "tag_filter" => '$("#' . $this->table_id . '-tag-filter").val()',
                "name_filter" => '$("#' . $this->table_id . '-name-filter").val()',
                "active_filter" => '$("#' . $this->table_id . '-active-filter").val()',
                "giamdoc_filter" => '$("#' . $this->table_id . '-giamdoc-filter").val()',
            ])
            ->dom("<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'row'<'col-sm-12 table-responsive't>><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>><'d-none'B>")
            ->buttons(
                Button::make('excel')->addClass("btn btn-success waves-effect")->text('<span class="fas fa-file-excel mx-2"></span> Export'),
                Button::make('reload')->addClass("btn btn-info waves-effect")->text('<span class="fas fa-filter mx-2"></span> Filter'),
            )
            ->parameters([
                "autoWidth" => false,
                "lengthMenu" => [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Tất cả"]
                ],
                "order" => [],
                'initComplete' => 'function(settings, json) {
                            var api = this.api();

                            $(document).on("click", "#filter_submit", function(e) {
                                api.draw(false);
                                e.preventDefault();
                            });

                            window.addEventListener("dt_draw", function(e) {
                                api.draw(false);
                                e.preventDefault();
                            })

                            $("thead#' . $this->table_id . '-thead").insertAfter(api.table().header());

                            api.buttons()
                                .container()
                                .removeClass("btn-group")
                                .appendTo($("#datatable-buttons"));

                            $("#datatable-buttons").removeClass("d-none")
                        }',
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
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title("")
                ->footer(""),
            Column::make('name')
                ->title("Tên Chi nhánh")
                ->width(350)
                ->searchable(false)
                ->orderable(false)
                ->footer("Tên Chi nhánh")
                ->filterView(view('thotam-laravel-datatables-filter::input', ['c_placeholder' => "Lọc theo tên"])->with("colum_filter_id")),
            Column::make('tag')
                ->title("Tag")
                ->width(25)
                ->searchable(false)
                ->orderable(false)
                ->footer("Tag")
                ->filterView(view('thotam-laravel-datatables-filter::input', ['c_placeholder' => "Lọc theo Tag"])->with("colum_filter_id")),
            Column::make('giamdoc')
                ->title("Giám đốc")
                ->width(25)
                ->searchable(false)
                ->orderable(false)
                ->footer("Giám đốc")
                ->filterView(view('thotam-laravel-datatables-filter::input', ['c_placeholder' => "Giám đốc"])->with("colum_filter_id")),
            Column::make('active')
                ->title("Trạng thái")
                ->width(50)
                ->addClass('text-center')
                ->searchable(false)
                ->orderable(false)
                ->footer("Trạng thái")
                ->filterView(view('thotam-laravel-datatables-filter::select-single', ['selects' => $this->getTrangThaisProperty(), 'c_placeholder' => "Trạng thái"])->with("colum_filter_id")),
            Column::computed('diachi')
                ->title("Địa chỉ")
                ->footer("Địa chỉ")
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Danh sách Chi nhánh ' . date('YmdHis');
    }


    public function getTrangThaisProperty()
    {
        return [
            "1" => "Activating",
            "-1" => "Deleted",
        ];
    }
}
