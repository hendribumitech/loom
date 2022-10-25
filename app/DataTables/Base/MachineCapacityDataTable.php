<?php

namespace App\DataTables\Base;

use App\Models\Base\MachineCapacity;
use App\DataTables\BaseDataTable as DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class MachineCapacityDataTable extends DataTable
{
    private $machineId;
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
        $dataTable->editColumn('capacity', function($item){
            return $item->capacity.' ' .$item->capacityUom->name.' / '.$item->periodUom->name;
        });
        return $dataTable->addColumn('action', 'base.machine_capacities.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MachineCapacity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MachineCapacity $model)
    {   
        if($this->getMachineId()){
            return $model->where(['machine_id' => $this->getMachineId()])->select([$model->getTable().'.*'])->with(['capacityUom', 'periodUom', 'product'])->newQuery();    
        }
        return $model->select([$model->getTable().'.*'])->with(['capacityUom', 'periodUom', 'product'])->newQuery();
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
            'product_id' => new Column(['title' => __('models/machineCapacities.fields.product_id'),'name' => 'product_id', 'data' => 'product.name', 'searchable' => true, 'elmsearch' => 'text']),
            'capacity' => new Column(['title' => __('models/machineCapacities.fields.capacity'),'name' => 'capacity', 'data' => 'capacity', 'searchable' => false, 'elmsearch' => 'text']),
            // 'capacity_uom_id' => new Column(['title' => __('models/machineCapacities.fields.capacity_uom_id'),'name' => 'capacity_uom_id', 'data' => 'capacity_uom.name', 'searchable' => false, 'elmsearch' => 'text']),
            // 'period_uom_id' => new Column(['title' => __('models/machineCapacities.fields.period_uom_id'),'name' => 'period_uom_id', 'data' => 'period_uom.name', 'searchable' => false, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'machine_capacities_datatable_' . time();
    }

    /**
     * Get the value of machineId
     */ 
    public function getMachineId()
    {
        return $this->machineId;
    }

    /**
     * Set the value of machineId
     *
     * @return  self
     */ 
    public function setMachineId($machineId)
    {
        $this->machineId = $machineId;

        return $this;
    }
}
