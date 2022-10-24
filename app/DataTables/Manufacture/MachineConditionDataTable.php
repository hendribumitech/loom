<?php

namespace App\DataTables\Manufacture;

use App\Models\Manufacture\MachineCondition;
use App\DataTables\BaseDataTable as DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class MachineConditionDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        //'name' => \App\DataTables\FilterClass\MatchKeyword::class,        
    ];
    
    private $mapColumnSearch = [
        //'entity.name' => 'entity_id',
    ];

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        if (!empty($this->columnFilterOperator)) {
            foreach ($this->columnFilterOperator as $column => $operator) {
                $columnSearch = $this->mapColumnSearch[$column] ?? $column;
                $dataTable->filterColumn($column, new $operator($columnSearch));                
            }
        }
        
        return $dataTable->addColumn('action', 'manufacture.machine_conditions.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MachineCondition $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MachineCondition $model)
    {
        return $model->select([$model->getTable().'.*'])->with(['machine', 'shiftment', 'category'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $buttons = [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'import',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-upload"></i> ' .__('auth.app.import').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ];
                
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => '<"row" <"col-md-6"B><"col-md-6 text-end"l>>rtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => $buttons,
                 'language' => [
                   'url' => url('vendor/datatables/i18n/en-gb.json'),
                 ],
                 'responsive' => true,
                 'fixedHeader' => true,
                 'orderCellsTop' => true     
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
            'machine_id' => new Column(['title' => __('models/machineConditions.fields.machine_id'),'name' => 'machine_id', 'data' => 'machine.name', 'searchable' => true, 'elmsearch' => 'text']),
            'shiftment_id' => new Column(['title' => __('models/machineConditions.fields.shiftment_id'),'name' => 'shiftment_id', 'data' => 'shiftment.name', 'searchable' => true, 'elmsearch' => 'text']),
            'category_off_id' => new Column(['title' => __('models/machineConditions.fields.category_off_id'),'name' => 'category_off_id', 'data' => 'category.name', 'defaultContent' => '-','searchable' => true, 'elmsearch' => 'text']),
            'work_date' => new Column(['title' => __('models/machineConditions.fields.work_date'),'name' => 'work_date', 'data' => 'work_date', 'searchable' => true, 'elmsearch' => 'text']),
            'start' => new Column(['title' => __('models/machineConditions.fields.start'),'name' => 'start', 'data' => 'start', 'searchable' => true, 'elmsearch' => 'text']),
            'end' => new Column(['title' => __('models/machineConditions.fields.end'),'name' => 'end', 'data' => 'end', 'searchable' => true, 'elmsearch' => 'text']),
            'amount_minutes' => new Column(['title' => __('models/machineConditions.fields.amount_minutes'),'name' => 'amount_minutes', 'data' => 'amount_minutes', 'searchable' => true, 'elmsearch' => 'text']),
            'description' => new Column(['title' => __('models/machineConditions.fields.description'),'name' => 'description', 'data' => 'description', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'machine_conditions_datatable_' . time();
    }
}
