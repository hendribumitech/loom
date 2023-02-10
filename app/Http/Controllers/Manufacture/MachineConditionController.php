<?php

namespace App\Http\Controllers\Manufacture;

use App\DataTables\Manufacture\MachineConditionDataTable;
use App\Http\Requests\Manufacture\CreateMachineConditionRequest;
use App\Http\Requests\Manufacture\UpdateMachineConditionRequest;
use App\Repositories\Manufacture\MachineConditionRepository;
use App\Repositories\Base\MachineRepository;
use App\Repositories\Base\ShiftmentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class MachineConditionController extends AppBaseController
{
    /** @var  MachineConditionRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = MachineConditionRepository::class;
    }

    /**
     * Display a listing of the MachineCondition.
     *
     * @param MachineConditionDataTable $machineConditionDataTable
     * @return Response
     */
    public function index(MachineConditionDataTable $machineConditionDataTable)
    {
        return $machineConditionDataTable->render('manufacture.machine_conditions.index');
    }

    /**
     * Show the form for creating a new MachineCondition.
     *
     * @return Response
     */
    public function create()
    {
        return view('manufacture.machine_conditions.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created MachineCondition in storage.
     *
     * @param CreateMachineConditionRequest $request
     *
     * @return Response
     */
    public function store(CreateMachineConditionRequest $request)
    {
        $input = $request->all();

        $machineCondition = $this->getRepositoryObj()->create($input);
        if($machineCondition instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $machineCondition->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/machineConditions.singular')]));

        return redirect(route('manufacture.machineConditions.index'));
    }

    /**
     * Display the specified MachineCondition.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $machineCondition = $this->getRepositoryObj()->find($id);

        if (empty($machineCondition)) {
            Flash::error(__('models/machineConditions.singular').' '.__('messages.not_found'));

            return redirect(route('manufacture.machineConditions.index'));
        }

        return view('manufacture.machine_conditions.show')->with('machineCondition', $machineCondition);
    }

    /**
     * Show the form for editing the specified MachineCondition.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $machineCondition = $this->getRepositoryObj()->find($id);

        if (empty($machineCondition)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineConditions.singular')]));

            return redirect(route('manufacture.machineConditions.index'));
        }
        
        return view('manufacture.machine_conditions.edit')->with('machineCondition', $machineCondition)->with($this->getOptionItems());
    }

    /**
     * Update the specified MachineCondition in storage.
     *
     * @param  int              $id
     * @param UpdateMachineConditionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMachineConditionRequest $request)
    {
        $machineCondition = $this->getRepositoryObj()->find($id);

        if (empty($machineCondition)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineConditions.singular')]));

            return redirect(route('manufacture.machineConditions.index'));
        }

        $machineCondition = $this->getRepositoryObj()->update($request->all(), $id);
        if($machineCondition instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $machineCondition->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/machineConditions.singular')]));

        return redirect(route('manufacture.machineConditions.index'));
    }

    /**
     * Remove the specified MachineCondition from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $machineCondition = $this->getRepositoryObj()->find($id);

        if (empty($machineCondition)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineConditions.singular')]));

            return redirect(route('manufacture.machineConditions.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/machineConditions.singular')]));

        return redirect(route('manufacture.machineConditions.index'));
    }

    /**
     * Provide options item based on relationship model MachineCondition from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $machine = new MachineRepository(app());
        $shiftment = new ShiftmentRepository(app());
        return [
            'machineItems' => ['' => __('crud.option.machine_placeholder')] + $machine->pluck(),
            'shiftmentItems' => ['' => __('crud.option.shiftment_placeholder')] + $shiftment->pluck()            
        ];
    }
}
