<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\MachineDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateMachineRequest;
use App\Http\Requests\Base\UpdateMachineRequest;
use App\Repositories\Base\MachineRepository;
use App\Repositories\Base\UomRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class MachineController extends AppBaseController
{
    /** @var  MachineRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = MachineRepository::class;
    }

    /**
     * Display a listing of the Machine.
     *
     * @param MachineDataTable $machineDataTable
     * @return Response
     */
    public function index(MachineDataTable $machineDataTable)
    {
        return $machineDataTable->render('base.machines.index');
    }

    /**
     * Show the form for creating a new Machine.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.machines.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Machine in storage.
     *
     * @param CreateMachineRequest $request
     *
     * @return Response
     */
    public function store(CreateMachineRequest $request)
    {
        $input = $request->all();

        $machine = $this->getRepositoryObj()->create($input);
        if($machine instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $machine->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/machines.singular')]));

        return redirect(route('base.machines.index'));
    }

    /**
     * Display the specified Machine.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $machine = $this->getRepositoryObj()->find($id);

        if (empty($machine)) {
            Flash::error(__('models/machines.singular').' '.__('messages.not_found'));

            return redirect(route('base.machines.index'));
        }

        return view('base.machines.show')->with('machine', $machine);
    }

    /**
     * Show the form for editing the specified Machine.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $machine = $this->getRepositoryObj()->find($id);

        if (empty($machine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machines.singular')]));

            return redirect(route('base.machines.index'));
        }
        
        return view('base.machines.edit')->with('machine', $machine)->with($this->getOptionItems());
    }

    /**
     * Update the specified Machine in storage.
     *
     * @param  int              $id
     * @param UpdateMachineRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMachineRequest $request)
    {
        $machine = $this->getRepositoryObj()->find($id);

        if (empty($machine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machines.singular')]));

            return redirect(route('base.machines.index'));
        }

        $machine = $this->getRepositoryObj()->update($request->all(), $id);
        if($machine instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $machine->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/machines.singular')]));

        return redirect(route('base.machines.index'));
    }

    /**
     * Remove the specified Machine from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $machine = $this->getRepositoryObj()->find($id);

        if (empty($machine)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machines.singular')]));

            return redirect(route('base.machines.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/machines.singular')]));

        return redirect(route('base.machines.index'));
    }

    /**
     * Provide options item based on relationship model Machine from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $uom = new UomRepository(app());        
        return [
            'capacityUomItems' => ['' => __('crud.option.uom_placeholder')] + $uom->pluck(),
            'periodUomItems' => ['' => __('crud.option.uom_placeholder')] + $uom->pluck()            
        ];
    }
}
