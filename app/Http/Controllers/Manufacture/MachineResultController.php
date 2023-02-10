<?php

namespace App\Http\Controllers\Manufacture;

use App\DataTables\Manufacture\MachineResultDataTable;
use App\Http\Requests\Manufacture;
use App\Http\Requests\Manufacture\CreateMachineResultRequest;
use App\Http\Requests\Manufacture\UpdateMachineResultRequest;
use App\Repositories\Manufacture\MachineResultRepository;
use App\Repositories\Base\UomRepository;
use App\Repositories\Base\MachineRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class MachineResultController extends AppBaseController
{
    /** @var  MachineResultRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = MachineResultRepository::class;
    }

    /**
     * Display a listing of the MachineResult.
     *
     * @param MachineResultDataTable $machineResultDataTable
     * @return Response
     */
    public function index(MachineResultDataTable $machineResultDataTable)
    {
        return $machineResultDataTable->render('manufacture.machine_results.index');
    }

    /**
     * Show the form for creating a new MachineResult.
     *
     * @return Response
     */
    public function create()
    {
        return view('manufacture.machine_results.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created MachineResult in storage.
     *
     * @param CreateMachineResultRequest $request
     *
     * @return Response
     */
    public function store(CreateMachineResultRequest $request)
    {
        $input = $request->all();

        $machineResult = $this->getRepositoryObj()->create($input);
        if($machineResult instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $machineResult->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/machineResults.singular')]));

        return redirect(route('manufacture.machineResults.index'));
    }

    /**
     * Display the specified MachineResult.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $machineResult = $this->getRepositoryObj()->find($id);

        if (empty($machineResult)) {
            Flash::error(__('models/machineResults.singular').' '.__('messages.not_found'));

            return redirect(route('manufacture.machineResults.index'));
        }

        return view('manufacture.machine_results.show')->with('machineResult', $machineResult);
    }

    /**
     * Show the form for editing the specified MachineResult.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $machineResult = $this->getRepositoryObj()->find($id);

        if (empty($machineResult)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineResults.singular')]));

            return redirect(route('manufacture.machineResults.index'));
        }
        
        return view('manufacture.machine_results.edit')->with('machineResult', $machineResult)->with($this->getOptionItems());
    }

    /**
     * Update the specified MachineResult in storage.
     *
     * @param  int              $id
     * @param UpdateMachineResultRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMachineResultRequest $request)
    {
        $machineResult = $this->getRepositoryObj()->find($id);

        if (empty($machineResult)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineResults.singular')]));

            return redirect(route('manufacture.machineResults.index'));
        }

        $machineResult = $this->getRepositoryObj()->update($request->all(), $id);
        if($machineResult instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $machineResult->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/machineResults.singular')]));

        return redirect(route('manufacture.machineResults.index'));
    }

    /**
     * Remove the specified MachineResult from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $machineResult = $this->getRepositoryObj()->find($id);

        if (empty($machineResult)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineResults.singular')]));

            return redirect(route('manufacture.machineResults.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/machineResults.singular')]));

        return redirect(route('manufacture.machineResults.index'));
    }

    /**
     * Provide options item based on relationship model MachineResult from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $uom = new UomRepository(app());
        $machine = new MachineRepository(app());
        return [
            'uomItems' => ['' => __('crud.option.uom_placeholder')] + $uom->pluck(),
            'machineItems' => ['' => __('crud.option.machine_placeholder')] + $machine->pluck()            
        ];
    }
}
