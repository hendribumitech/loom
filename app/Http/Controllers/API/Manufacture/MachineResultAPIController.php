<?php

namespace App\Http\Controllers\API\Manufacture;

use App\Http\Requests\API\Manufacture\CreateMachineResultAPIRequest;
use App\Http\Requests\API\Manufacture\UpdateMachineResultAPIRequest;
use App\Models\Manufacture\MachineResult;
use App\Repositories\Manufacture\MachineResultRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Manufacture\MachineResultResource;
use Response;

/**
 * Class MachineResultController
 * @package App\Http\Controllers\API\Manufacture
 */

class MachineResultAPIController extends AppBaseController
{
    /** @var  MachineResultRepository */
    private $machineResultRepository;

    public function __construct(MachineResultRepository $machineResultRepo)
    {
        $this->machineResultRepository = $machineResultRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/machineResults",
     *      summary="Get a listing of the MachineResults.",
     *      tags={"MachineResult"},
     *      description="Get all MachineResults",
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
     *                  @SWG\Items(ref="#/definitions/MachineResult")
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
        $machineResults = $this->machineResultRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MachineResultResource::collection($machineResults), 'Machine Results retrieved successfully');
    }

    /**
     * @param CreateMachineResultAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/machineResults",
     *      summary="Store a newly created MachineResult in storage",
     *      tags={"MachineResult"},
     *      description="Store MachineResult",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MachineResult that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MachineResult")
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
     *                  ref="#/definitions/MachineResult"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMachineResultAPIRequest $request)
    {
        $input = $request->all();

        $machineResult = $this->machineResultRepository->create($input);

        return $this->sendResponse(new MachineResultResource($machineResult), 'Machine Result saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/machineResults/{id}",
     *      summary="Display the specified MachineResult",
     *      tags={"MachineResult"},
     *      description="Get MachineResult",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineResult",
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
     *                  ref="#/definitions/MachineResult"
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
        /** @var MachineResult $machineResult */
        $machineResult = $this->machineResultRepository->find($id);

        if (empty($machineResult)) {
            return $this->sendError('Machine Result not found');
        }

        return $this->sendResponse(new MachineResultResource($machineResult), 'Machine Result retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMachineResultAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/machineResults/{id}",
     *      summary="Update the specified MachineResult in storage",
     *      tags={"MachineResult"},
     *      description="Update MachineResult",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineResult",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MachineResult that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MachineResult")
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
     *                  ref="#/definitions/MachineResult"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMachineResultAPIRequest $request)
    {
        $input = $request->all();

        /** @var MachineResult $machineResult */
        $machineResult = $this->machineResultRepository->find($id);

        if (empty($machineResult)) {
            return $this->sendError('Machine Result not found');
        }

        $machineResult = $this->machineResultRepository->update($input, $id);

        return $this->sendResponse(new MachineResultResource($machineResult), 'MachineResult updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/machineResults/{id}",
     *      summary="Remove the specified MachineResult from storage",
     *      tags={"MachineResult"},
     *      description="Delete MachineResult",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineResult",
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
        /** @var MachineResult $machineResult */
        $machineResult = $this->machineResultRepository->find($id);

        if (empty($machineResult)) {
            return $this->sendError('Machine Result not found');
        }

        $machineResult->delete();

        return $this->sendSuccess('Machine Result deleted successfully');
    }
}
