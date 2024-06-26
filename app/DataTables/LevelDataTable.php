<?php

namespace App\DataTables;

use App\Models\LevelModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LevelDataTable extends DataTable
{
/**
* Build the DataTable class.
*
* @param QueryBuilder $query Results from query() method.
*/
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($level){
                return '<a href="' . route('/level/update', ['id' => $level->level_id]) . '" class="btn btn-primary mr-2">
                        <i class="fa fa-pencil-alt" style="color: white; font-size:12px;"></i></a>' .
                        '<a href="' . route('/level/delete', ['id' => $level->level_id]) . '" class="btn btn-danger" 
                        onclick="return confirm(\'Are you sure want to delete this level?\')">
                        <i class="fa fa-trash" style="color: white; font-size: 12px;"></i></a>';
        })
        ->rawColumns(['action'])
        ->setRowId('id');
    }
    
    public function query(LevelModel $model): QueryBuilder
    {
        return $model->newQuery();
    }
    
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('level-table')
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
            Column::make('level_id'),
            Column::make('level_kode'),
            Column::make('level_nama'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }
    
    protected function filename(): string
    {
        return 'Level_' . date('YmdHis');
    }
}