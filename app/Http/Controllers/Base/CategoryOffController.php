<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\CategoryOffDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateCategoryOffRequest;
use App\Http\Requests\Base\UpdateCategoryOffRequest;
use App\Repositories\Base\CategoryOffRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Exception;

class CategoryOffController extends AppBaseController
{
    /** @var  CategoryOffRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = CategoryOffRepository::class;
    }

    /**
     * Display a listing of the CategoryOff.
     *
     * @param CategoryOffDataTable $categoryOffDataTable
     * @return Response
     */
    public function index(CategoryOffDataTable $categoryOffDataTable)
    {
        return $categoryOffDataTable->render('base.category_offs.index');
    }

    /**
     * Show the form for creating a new CategoryOff.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.category_offs.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created CategoryOff in storage.
     *
     * @param CreateCategoryOffRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryOffRequest $request)
    {
        $input = $request->all();

        $categoryOff = $this->getRepositoryObj()->create($input);
        if($categoryOff instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $categoryOff->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/categoryOffs.singular')]));

        return redirect(route('base.categoryOffs.index'));
    }

    /**
     * Display the specified CategoryOff.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoryOff = $this->getRepositoryObj()->find($id);

        if (empty($categoryOff)) {
            Flash::error(__('models/categoryOffs.singular').' '.__('messages.not_found'));

            return redirect(route('base.categoryOffs.index'));
        }

        return view('base.category_offs.show')->with('categoryOff', $categoryOff);
    }

    /**
     * Show the form for editing the specified CategoryOff.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoryOff = $this->getRepositoryObj()->find($id);

        if (empty($categoryOff)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoryOffs.singular')]));

            return redirect(route('base.categoryOffs.index'));
        }
        
        return view('base.category_offs.edit')->with('categoryOff', $categoryOff)->with($this->getOptionItems());
    }

    /**
     * Update the specified CategoryOff in storage.
     *
     * @param  int              $id
     * @param UpdateCategoryOffRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryOffRequest $request)
    {
        $categoryOff = $this->getRepositoryObj()->find($id);

        if (empty($categoryOff)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoryOffs.singular')]));

            return redirect(route('base.categoryOffs.index'));
        }

        $categoryOff = $this->getRepositoryObj()->update($request->all(), $id);
        if($categoryOff instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $categoryOff->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/categoryOffs.singular')]));

        return redirect(route('base.categoryOffs.index'));
    }

    /**
     * Remove the specified CategoryOff from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoryOff = $this->getRepositoryObj()->find($id);

        if (empty($categoryOff)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoryOffs.singular')]));

            return redirect(route('base.categoryOffs.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/categoryOffs.singular')]));

        return redirect(route('base.categoryOffs.index'));
    }

    /**
     * Provide options item based on relationship model CategoryOff from storage.         
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
