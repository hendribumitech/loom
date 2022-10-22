<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\ShiftmentDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateShiftmentRequest;
use App\Http\Requests\Base\UpdateShiftmentRequest;
use App\Repositories\Base\ShiftmentRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class ShiftmentController extends AppBaseController
{
    /** @var  ShiftmentRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ShiftmentRepository::class;
    }

    /**
     * Display a listing of the Shiftment.
     *
     * @param ShiftmentDataTable $shiftmentDataTable
     * @return Response
     */
    public function index(ShiftmentDataTable $shiftmentDataTable)
    {
        return $shiftmentDataTable->render('base.shiftments.index');
    }

    /**
     * Show the form for creating a new Shiftment.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.shiftments.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Shiftment in storage.
     *
     * @param CreateShiftmentRequest $request
     *
     * @return Response
     */
    public function store(CreateShiftmentRequest $request)
    {
        $input = $request->all();

        $shiftment = $this->getRepositoryObj()->create($input);
        if($shiftment instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $shiftment->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/shiftments.singular')]));

        return redirect(route('base.shiftments.index'));
    }

    /**
     * Display the specified Shiftment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shiftment = $this->getRepositoryObj()->find($id);

        if (empty($shiftment)) {
            Flash::error(__('models/shiftments.singular').' '.__('messages.not_found'));

            return redirect(route('base.shiftments.index'));
        }

        return view('base.shiftments.show')->with('shiftment', $shiftment);
    }

    /**
     * Show the form for editing the specified Shiftment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shiftment = $this->getRepositoryObj()->find($id);

        if (empty($shiftment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/shiftments.singular')]));

            return redirect(route('base.shiftments.index'));
        }
        
        return view('base.shiftments.edit')->with('shiftment', $shiftment)->with($this->getOptionItems());
    }

    /**
     * Update the specified Shiftment in storage.
     *
     * @param  int              $id
     * @param UpdateShiftmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShiftmentRequest $request)
    {
        $shiftment = $this->getRepositoryObj()->find($id);

        if (empty($shiftment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/shiftments.singular')]));

            return redirect(route('base.shiftments.index'));
        }

        $shiftment = $this->getRepositoryObj()->update($request->all(), $id);
        if($shiftment instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $shiftment->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/shiftments.singular')]));

        return redirect(route('base.shiftments.index'));
    }

    /**
     * Remove the specified Shiftment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shiftment = $this->getRepositoryObj()->find($id);

        if (empty($shiftment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/shiftments.singular')]));

            return redirect(route('base.shiftments.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/shiftments.singular')]));

        return redirect(route('base.shiftments.index'));
    }

    /**
     * Provide options item based on relationship model Shiftment from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        
        return [
                        
        ];
    }
}
