<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\MachineCapacityDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateMachineCapacityRequest;
use App\Http\Requests\Base\UpdateMachineCapacityRequest;
use App\Repositories\Base\MachineCapacityRepository;
use App\Repositories\Base\UomRepository;
use App\Repositories\Base\ProductRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Base\Machine;
use App\Repositories\Base\MachineRepository;
use Response;
use Exception;

class MachineCapacityController extends AppBaseController
{
    /** @var  MachineCapacityRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = MachineCapacityRepository::class;
    }

    /**
     * Display a listing of the MachineCapacity.
     *
     * @param MachineCapacityDataTable $machineCapacityDataTable
     * @return Response
     */
    public function index(int $machine, MachineCapacityDataTable $machineCapacityDataTable)
    {
        $machineItem = (new MachineRepository())->find($machine);
        return $machineCapacityDataTable->setMachineId($machine)->render('base.machine_capacities.index', ['machine' => $machine, 'title' => $machineItem->name ]);
    }

    /**
     * Show the form for creating a new MachineCapacity.
     *
     * @return Response
     */
    public function create(int $machine)
    {
        return view('base.machine_capacities.create')->with($this->getOptionItems($machine))->with(['machine' => $machine]);
    }

    /**
     * Store a newly created MachineCapacity in storage.
     *
     * @param CreateMachineCapacityRequest $request
     *
     * @return Response
     */
    public function store(int $machine, CreateMachineCapacityRequest $request)
    {
        $input = $request->all();
        $input['machine_id'] = $machine;
        $machineCapacity = $this->getRepositoryObj()->create($input);
        if($machineCapacity instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $machineCapacity->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/machineCapacities.singular')]));

        return redirect(route('base.machines.machineCapacities.index', $machine));
    }

    /**
     * Display the specified MachineCapacity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(int $machine, $id)
    {
        $machineCapacity = $this->getRepositoryObj()->find($id);

        if (empty($machineCapacity)) {
            Flash::error(__('models/machineCapacities.singular').' '.__('messages.not_found'));

            return redirect(route('base.machines.machineCapacities.index', $machine));
        }

        return view('base.machine_capacities.show')->with('machineCapacity', $machineCapacity);
    }

    /**
     * Show the form for editing the specified MachineCapacity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(int $machine,$id)
    {
        $machineCapacity = $this->getRepositoryObj()->find($id);

        if (empty($machineCapacity)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineCapacities.singular')]));

            return redirect(route('base.machines.machineCapacities.index', $machine));
        }
        
        return view('base.machine_capacities.edit')->with('machineCapacity', $machineCapacity)->with('machine', $machine)->with($this->getOptionItems($machine));
    }

    /**
     * Update the specified MachineCapacity in storage.
     *
     * @param  int              $id
     * @param UpdateMachineCapacityRequest $request
     *
     * @return Response
     */
    public function update(int $machine, $id, UpdateMachineCapacityRequest $request)
    {
        $machineCapacity = $this->getRepositoryObj()->find($id);

        if (empty($machineCapacity)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineCapacities.singular')]));

            return redirect(route('base.machines.machineCapacities.index', $machine));
        }
        $request->merge(['machine_id' => $machine]);
        $machineCapacity = $this->getRepositoryObj()->update($request->all(), $id);
        if($machineCapacity instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $machineCapacity->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/machineCapacities.singular')]));

        return redirect(route('base.machines.machineCapacities.index', $machine));
    }

    /**
     * Remove the specified MachineCapacity from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(int $machine, $id)
    {
        $machineCapacity = $this->getRepositoryObj()->find($id);

        if (empty($machineCapacity)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineCapacities.singular')]));

            return redirect(route('base.machines.machineCapacities.index', $machine));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/machineCapacities.singular')]));

        return redirect(route('base.machines.machineCapacities.index', $machine));
    }

    /**
     * Provide options item based on relationship model MachineCapacity from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(int $machine){        
        $machineItem = Machine::find($machine);
        $uom = new UomRepository();
        $uomItem = $uom->all()->filter(function($item) use ($machineItem) {
            return in_array($item->id, [$machineItem->capacity_uom_id, $machineItem->period_uom_id]);
        })->groupBy('category');
        $product = new ProductRepository();
        return [
            'capacityUomItems' => ['' => __('crud.option.uom_placeholder')] + $uomItem['weight']->pluck('name', 'id')->toArray(),
            'periodUomItems' => ['' => __('crud.option.uom_placeholder')] + $uomItem['duration']->pluck('name', 'id')->toArray(),
            'productItems' => ['' => __('crud.option.product_placeholder')] + $product->pluck()
        ];
    }
}
