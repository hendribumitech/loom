<?php

namespace App\Http\Controllers\Manufacture;

use App\DataTables\Manufacture\MachineProductivityDataTable;
use App\Http\Requests\Manufacture;
use App\Http\Requests\Manufacture\CreateMachineProductivityRequest;
use App\Http\Requests\Manufacture\UpdateMachineProductivityRequest;
use App\Repositories\Manufacture\MachineProductivityRepository;
use App\Repositories\Manufacture\UomRepository;
use App\Repositories\Manufacture\MachineRepository;
use App\Repositories\Manufacture\ShiftmentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class MachineProductivityController extends AppBaseController
{
    /** @var  MachineProductivityRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = MachineProductivityRepository::class;
    }

    /**
     * Display a listing of the MachineProductivity.
     *
     * @param MachineProductivityDataTable $machineProductivityDataTable
     * @return Response
     */
    public function index(MachineProductivityDataTable $machineProductivityDataTable)
    {
        return $machineProductivityDataTable->render('manufacture.machine_productivities.index');
    }

    /**
     * Show the form for creating a new MachineProductivity.
     *
     * @return Response
     */
    public function create()
    {
        return view('manufacture.machine_productivities.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created MachineProductivity in storage.
     *
     * @param CreateMachineProductivityRequest $request
     *
     * @return Response
     */
    public function store(CreateMachineProductivityRequest $request)
    {
        $input = $request->all();

        $machineProductivity = $this->getRepositoryObj()->create($input);
        if($machineProductivity instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $machineProductivity->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/machineProductivities.singular')]));

        return redirect(route('manufacture.machineProductivities.index'));
    }

    /**
     * Display the specified MachineProductivity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $machineProductivity = $this->getRepositoryObj()->find($id);

        if (empty($machineProductivity)) {
            Flash::error(__('models/machineProductivities.singular').' '.__('messages.not_found'));

            return redirect(route('manufacture.machineProductivities.index'));
        }

        return view('manufacture.machine_productivities.show')->with('machineProductivity', $machineProductivity);
    }

    /**
     * Show the form for editing the specified MachineProductivity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $machineProductivity = $this->getRepositoryObj()->find($id);

        if (empty($machineProductivity)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineProductivities.singular')]));

            return redirect(route('manufacture.machineProductivities.index'));
        }
        
        return view('manufacture.machine_productivities.edit')->with('machineProductivity', $machineProductivity)->with($this->getOptionItems());
    }

    /**
     * Update the specified MachineProductivity in storage.
     *
     * @param  int              $id
     * @param UpdateMachineProductivityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMachineProductivityRequest $request)
    {
        $machineProductivity = $this->getRepositoryObj()->find($id);

        if (empty($machineProductivity)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineProductivities.singular')]));

            return redirect(route('manufacture.machineProductivities.index'));
        }

        $machineProductivity = $this->getRepositoryObj()->update($request->all(), $id);
        if($machineProductivity instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $machineProductivity->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/machineProductivities.singular')]));

        return redirect(route('manufacture.machineProductivities.index'));
    }

    /**
     * Remove the specified MachineProductivity from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $machineProductivity = $this->getRepositoryObj()->find($id);

        if (empty($machineProductivity)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineProductivities.singular')]));

            return redirect(route('manufacture.machineProductivities.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/machineProductivities.singular')]));

        return redirect(route('manufacture.machineProductivities.index'));
    }

    /**
     * Provide options item based on relationship model MachineProductivity from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $uom = new UomRepository(app());
        $machine = new MachineRepository(app());
        $shiftment = new ShiftmentRepository(app());
        $uom = new UomRepository(app());
        return [
            'uomItems' => ['' => __('crud.option.uom_placeholder')] + $uom->pluck(),
            'machineItems' => ['' => __('crud.option.machine_placeholder')] + $machine->pluck(),
            'shiftmentItems' => ['' => __('crud.option.shiftment_placeholder')] + $shiftment->pluck(),
            'uomItems' => ['' => __('crud.option.uom_placeholder')] + $uom->pluck()            
        ];
    }
}
