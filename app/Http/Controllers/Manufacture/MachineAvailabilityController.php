<?php

namespace App\Http\Controllers\Manufacture;

use App\DataTables\Manufacture\MachineAvailabilityDataTable;
use App\Http\Requests\Manufacture\CreateMachineAvailabilityRequest;
use App\Http\Requests\Manufacture\UpdateMachineAvailabilityRequest;
use App\Repositories\Manufacture\MachineAvailabilityRepository;
use App\Repositories\Base\MachineRepository;
use App\Repositories\Base\ShiftmentRepository;
use App\Repositories\Base\UomRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class MachineAvailabilityController extends AppBaseController
{
    /** @var  MachineAvailabilityRepository */
    protected $repository;
    protected $baseRoute = 'manufacture.machineAvailabilities';
    protected $baseView = 'manufacture.machine_availabilities';
    public function __construct()
    {
        $this->repository = MachineAvailabilityRepository::class;
    }

    /**
     * Display a listing of the MachineAvailability.
     *
     * @param MachineAvailabilityDataTable $machineAvailabilityDataTable
     * @return Response
     */
    public function index(MachineAvailabilityDataTable $machineAvailabilityDataTable)
    {
        return $machineAvailabilityDataTable->setBaseView($this->baseView)->setBaseRoute($this->baseRoute)->render($this->baseView.'.index', ['baseView' => $this->baseView]);
    }

    /**
     * Show the form for creating a new MachineAvailability.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->baseView.'.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created MachineAvailability in storage.
     *
     * @param CreateMachineAvailabilityRequest $request
     *
     * @return Response
     */
    public function store(CreateMachineAvailabilityRequest $request)
    {
        $input = $request->all();
        $period = generatePeriod($request->get('work_date'));             
        $data = [
            'startDate' => $period['startDate'],
            'endDate' => $period['endDate'],
            'machine_id' => $input['machine_id']
        ];

        $machineAvailability = $this->getRepositoryObj()->generate($data);
        if($machineAvailability instanceof Exception){
            $input['work_date'] = localFormatDate($data['startDate']).' - '.localFormatDate($data['endDate']);
            return redirect()->back()->withInput($input)->withErrors(['error', $machineAvailability->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/machineAvailabilities.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Display the specified MachineAvailability.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $machineAvailability = $this->getRepositoryObj()->find($id);

        if (empty($machineAvailability)) {
            Flash::error(__('models/machineAvailabilities.singular').' '.__('messages.not_found'));

            return redirect(route($this->baseRoute.'.index'));
        }

        return view($this->baseView.'.show')->with('machineAvailability', $machineAvailability);
    }

    /**
     * Show the form for editing the specified MachineAvailability.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $machineAvailability = $this->getRepositoryObj()->find($id);

        if (empty($machineAvailability)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineAvailabilities.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }
        
        return view($this->baseView.'.edit')->with('machineAvailability', $machineAvailability)->with($this->getOptionItems());
    }

    /**
     * Update the specified MachineAvailability in storage.
     *
     * @param  int              $id
     * @param UpdateMachineAvailabilityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMachineAvailabilityRequest $request)
    {
        $machineAvailability = $this->getRepositoryObj()->find($id);

        if (empty($machineAvailability)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineAvailabilities.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $machineAvailability = $this->getRepositoryObj()->update($request->all(), $id);
        if($machineAvailability instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $machineAvailability->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/machineAvailabilities.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Remove the specified MachineAvailability from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $machineAvailability = $this->getRepositoryObj()->find($id);

        if (empty($machineAvailability)) {
            Flash::error(__('messages.not_found', ['model' => __('models/machineAvailabilities.singular')]));

            return redirect(route($this->baseRoute.'.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/machineAvailabilities.singular')]));

        return redirect(route($this->baseRoute.'.index'));
    }

    /**
     * Provide options item based on relationship model MachineAvailability from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $machine = new MachineRepository();
        $shiftment = new ShiftmentRepository();
        $uom = new UomRepository();
        return [
            'baseRoute' => $this->baseRoute,
            'baseView' => $this->baseView,
            'machineItems' => $machine->pluck(),
            'shiftmentItems' => ['' => __('crud.option.shiftment_placeholder')] + $shiftment->pluck(),
            'uomItems' => ['' => __('crud.option.uom_placeholder')] + $uom->pluck()            
        ];
    }
}
