<?php

namespace App\DataTables\Manufacture;

use App\Models\Manufacture\MachineProductivity;
use App\DataTables\BaseDataTable as DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class MachineProductivityDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'manufacture.machine_productivities.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MachineProductivity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MachineProductivity $model)
    {
        return $model->select([$model->getTable().'.*'])->newQuery();
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
            'machine_id' => new Column(['title' => __('models/machineProductivities.fields.machine_id'),'name' => 'machine_id', 'data' => 'machine_id', 'searchable' => true, 'elmsearch' => 'text']),
            'shiftment_id' => new Column(['title' => __('models/machineProductivities.fields.shiftment_id'),'name' => 'shiftment_id', 'data' => 'shiftment_id', 'searchable' => true, 'elmsearch' => 'text']),
            'work_date' => new Column(['title' => __('models/machineProductivities.fields.work_date'),'name' => 'work_date', 'data' => 'work_date', 'searchable' => true, 'elmsearch' => 'text']),
            'capacity' => new Column(['title' => __('models/machineProductivities.fields.capacity'),'name' => 'capacity', 'data' => 'capacity', 'searchable' => true, 'elmsearch' => 'text']),
            'capacity_uom_id' => new Column(['title' => __('models/machineProductivities.fields.capacity_uom_id'),'name' => 'capacity_uom_id', 'data' => 'capacity_uom_id', 'searchable' => true, 'elmsearch' => 'text']),
            'duration_target' => new Column(['title' => __('models/machineProductivities.fields.duration_target'),'name' => 'duration_target', 'data' => 'duration_target', 'searchable' => true, 'elmsearch' => 'text']),
            'duration_off' => new Column(['title' => __('models/machineProductivities.fields.duration_off'),'name' => 'duration_off', 'data' => 'duration_off', 'searchable' => true, 'elmsearch' => 'text']),
            'amount_target' => new Column(['title' => __('models/machineProductivities.fields.amount_target'),'name' => 'amount_target', 'data' => 'amount_target', 'searchable' => true, 'elmsearch' => 'text']),
            'amount_result' => new Column(['title' => __('models/machineProductivities.fields.amount_result'),'name' => 'amount_result', 'data' => 'amount_result', 'searchable' => true, 'elmsearch' => 'text']),
            'uom_id' => new Column(['title' => __('models/machineProductivities.fields.uom_id'),'name' => 'uom_id', 'data' => 'uom_id', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'machine_productivities_datatable_' . time();
    }
}
