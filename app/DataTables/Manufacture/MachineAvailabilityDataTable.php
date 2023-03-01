<?php

namespace App\DataTables\Manufacture;

use App\Models\Manufacture\MachineAvailability;
use App\DataTables\BaseDataTable as DataTable;
use App\Repositories\Base\MachineRepository;
use App\Repositories\Base\ShiftmentRepository;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class MachineAvailabilityDataTable extends DataTable
{
    private $baseRoute;
    private $baseView;
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        'machine_id' => \App\DataTables\FilterClass\InKeyword::class,
        'shiftment_id' => \App\DataTables\FilterClass\InKeyword::class,
        'work_date' => \App\DataTables\FilterClass\BetweenKeyword::class
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
        return $dataTable->addColumn('action', function($item){
            return view($this->baseView.'.datatables_actions', array_merge($item->toArray(), ['baseRoute' => $this->getBaseRoute()]));
        });        
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MachineAvailability $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MachineAvailability $model)
    {
        return $model->select([$model->getTable().'.*'])->with(['uom', 'machine', 'shiftment'])->newQuery();
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
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.generate').''
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
                    [
                        'extend' => 'create',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-calendar"></i> Resume',
                        'action' => <<<FUNC
                            function(e, dt, button, config){
                                button.data('url', 'manufacture/machineAvailabilities/resume')
                                button.data('target', '_parent')
                                button.data('tipe', 'get')
                                main.redirectUrl(button)
                            }
FUNC
                    ],
                ];
                
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => '<"row" <"col-md-6"B><"col-md-6 text-end"l>>rtip',
                'stateSave' => false,
                'order'     => [[2, 'asc'],[1, 'asc']],
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
        $machineItems = convertArrayPairValueWithKey((new MachineRepository())->pluck());
        $shiftmentItems = convertArrayPairValueWithKey((new ShiftmentRepository())->pluck());
        return [
            'machine_id' => new Column(['title' => __('models/machineAvailabilities.fields.machine_id'),'name' => 'machine_id', 'data' => 'machine.name', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $machineItems, 'multiple' => 'multiple']),
            'shiftment_id' => new Column(['title' => __('models/machineAvailabilities.fields.shiftment_id'),'name' => 'shiftment_id', 'data' => 'shiftment.name', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $shiftmentItems, 'multiple' => 'multiple']),
            'work_date' => new Column(['title' => __('models/machineAvailabilities.fields.work_date'),'name' => 'work_date', 'data' => 'work_date', 'searchable' => true, 'elmsearch' => 'daterange']),
            'duration_target' => new Column(['title' => __('models/machineAvailabilities.fields.duration_target'),'name' => 'duration_target', 'data' => 'duration_target', 'searchable' => false, 'elmsearch' => 'text', 'class' => 'text-end']),
            'duration_off' => new Column(['title' => __('models/machineAvailabilities.fields.duration_off'),'name' => 'duration_off', 'data' => 'duration_off', 'searchable' => false, 'elmsearch' => 'text', 'class' => 'text-end']),
            'uom_id' => new Column(['title' => __('models/machineAvailabilities.fields.uom_id'),'name' => 'uom_id', 'data' => 'uom.name', 'searchable' => false, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'machine_availabilities_datatable_' . time();
    }

    /**
     * Get the value of baseRoute
     */ 
    public function getBaseRoute()
    {
        return $this->baseRoute;
    }

    /**
     * Set the value of baseRoute
     *
     * @return  self
     */ 
    public function setBaseRoute($baseRoute)
    {
        $this->baseRoute = $baseRoute;

        return $this;
    }

    /**
     * Get the value of baseView
     */ 
    public function getBaseView()
    {
        return $this->baseView;
    }

    /**
     * Set the value of baseView
     *
     * @return  self
     */ 
    public function setBaseView($baseView)
    {
        $this->baseView = $baseView;

        return $this;
    }
}
