<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Requests\API\Base\CreateCategoryOffAPIRequest;
use App\Http\Requests\API\Base\UpdateCategoryOffAPIRequest;
use App\Models\Base\CategoryOff;
use App\Repositories\Base\CategoryOffRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Base\CategoryOffResource;
use Response;

/**
 * Class CategoryOffController
 * @package App\Http\Controllers\API\Base
 */

class CategoryOffAPIController extends AppBaseController
{
    /** @var  CategoryOffRepository */
    private $categoryOffRepository;

    public function __construct(CategoryOffRepository $categoryOffRepo)
    {
        $this->categoryOffRepository = $categoryOffRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/categoryOffs",
     *      summary="Get a listing of the CategoryOffs.",
     *      tags={"CategoryOff"},
     *      description="Get all CategoryOffs",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/CategoryOff")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $categoryOffs = $this->categoryOffRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CategoryOffResource::collection($categoryOffs), 'Category Offs retrieved successfully');
    }

    /**
     * @param CreateCategoryOffAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/categoryOffs",
     *      summary="Store a newly created CategoryOff in storage",
     *      tags={"CategoryOff"},
     *      description="Store CategoryOff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CategoryOff that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CategoryOff")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/CategoryOff"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCategoryOffAPIRequest $request)
    {
        $input = $request->all();

        $categoryOff = $this->categoryOffRepository->create($input);

        return $this->sendResponse(new CategoryOffResource($categoryOff), 'Category Off saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/categoryOffs/{id}",
     *      summary="Display the specified CategoryOff",
     *      tags={"CategoryOff"},
     *      description="Get CategoryOff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CategoryOff",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/CategoryOff"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var CategoryOff $categoryOff */
        $categoryOff = $this->categoryOffRepository->find($id);

        if (empty($categoryOff)) {
            return $this->sendError('Category Off not found');
        }

        return $this->sendResponse(new CategoryOffResource($categoryOff), 'Category Off retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCategoryOffAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/categoryOffs/{id}",
     *      summary="Update the specified CategoryOff in storage",
     *      tags={"CategoryOff"},
     *      description="Update CategoryOff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CategoryOff",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CategoryOff that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CategoryOff")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/CategoryOff"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCategoryOffAPIRequest $request)
    {
        $input = $request->all();

        /** @var CategoryOff $categoryOff */
        $categoryOff = $this->categoryOffRepository->find($id);

        if (empty($categoryOff)) {
            return $this->sendError('Category Off not found');
        }

        $categoryOff = $this->categoryOffRepository->update($input, $id);

        return $this->sendResponse(new CategoryOffResource($categoryOff), 'CategoryOff updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/categoryOffs/{id}",
     *      summary="Remove the specified CategoryOff from storage",
     *      tags={"CategoryOff"},
     *      description="Delete CategoryOff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CategoryOff",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var CategoryOff $categoryOff */
        $categoryOff = $this->categoryOffRepository->find($id);

        if (empty($categoryOff)) {
            return $this->sendError('Category Off not found');
        }

        $categoryOff->delete();

        return $this->sendSuccess('Category Off deleted successfully');
    }
}
