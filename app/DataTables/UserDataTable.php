<?php

namespace App\DataTables;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('actions', function($user) {
                return '<a href="' . route('/user/update', ['id' => $user->user_id]) . ' " class="btn btn-primary mr-2">
                <i class="fa fa-pencil-alt" style="color: white; font-size: 12px;"></i></a>'.
                '<a href="'.route('/user/delete', ['id' => $user->user_id]) . ' " class="btn btn-danger" onclick="return confirm(\'Are you sure to delete this user?\')">
                <i class="fa fa-trash" style="color: white; font-size: 12px;"></i>
                </a>';
            })
            ->rawColumns(['actions'])
            ->setRowId('id');
    }

    public function query(UserModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('user_id'),
            Column::make('level_id'),
            Column::make('username'),
            Column::make('nama'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('actions')
            ->exportable(false)
            ->printable(false)
            ->width(100)
            ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
