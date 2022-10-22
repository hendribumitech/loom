<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\UomDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateUomRequest;
use App\Http\Requests\Base\UpdateUomRequest;
use App\Repositories\Base\UomRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class UomController extends AppBaseController
{
    /** @var  UomRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = UomRepository::class;
    }

    /**
     * Display a listing of the Uom.
     *
     * @param UomDataTable $uomDataTable
     * @return Response
     */
    public function index(UomDataTable $uomDataTable)
    {
        return $uomDataTable->render('base.uoms.index');
    }

    /**
     * Show the form for creating a new Uom.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.uoms.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Uom in storage.
     *
     * @param CreateUomRequest $request
     *
     * @return Response
     */
    public function store(CreateUomRequest $request)
    {
        $input = $request->all();

        $uom = $this->getRepositoryObj()->create($input);
        if($uom instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $uom->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/uoms.singular')]));

        return redirect(route('base.uoms.index'));
    }

    /**
     * Display the specified Uom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $uom = $this->getRepositoryObj()->find($id);

        if (empty($uom)) {
            Flash::error(__('models/uoms.singular').' '.__('messages.not_found'));

            return redirect(route('base.uoms.index'));
        }

        return view('base.uoms.show')->with('uom', $uom);
    }

    /**
     * Show the form for editing the specified Uom.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $uom = $this->getRepositoryObj()->find($id);

        if (empty($uom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/uoms.singular')]));

            return redirect(route('base.uoms.index'));
        }
        
        return view('base.uoms.edit')->with('uom', $uom)->with($this->getOptionItems());
    }

    /**
     * Update the specified Uom in storage.
     *
     * @param  int              $id
     * @param UpdateUomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUomRequest $request)
    {
        $uom = $this->getRepositoryObj()->find($id);

        if (empty($uom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/uoms.singular')]));

            return redirect(route('base.uoms.index'));
        }

        $uom = $this->getRepositoryObj()->update($request->all(), $id);
        if($uom instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $uom->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/uoms.singular')]));

        return redirect(route('base.uoms.index'));
    }

    /**
     * Remove the specified Uom from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $uom = $this->getRepositoryObj()->find($id);

        if (empty($uom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/uoms.singular')]));

            return redirect(route('base.uoms.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/uoms.singular')]));

        return redirect(route('base.uoms.index'));
    }

    /**
     * Provide options item based on relationship model Uom from storage.         
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
