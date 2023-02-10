<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Requests\API\Base\CreateMachineCapacityAPIRequest;
use App\Http\Requests\API\Base\UpdateMachineCapacityAPIRequest;
use App\Models\Base\MachineCapacity;
use App\Repositories\Base\MachineCapacityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Base\MachineCapacityResource;
use Response;

/**
 * Class MachineCapacityController
 * @package App\Http\Controllers\API\Base
 */

class MachineCapacityAPIController extends AppBaseController
{
    /** @var  MachineCapacityRepository */
    private $machineCapacityRepository;

    public function __construct(MachineCapacityRepository $machineCapacityRepo)
    {
        $this->machineCapacityRepository = $machineCapacityRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/machineCapacities",
     *      summary="Get a listing of the MachineCapacities.",
     *      tags={"MachineCapacity"},
     *      description="Get all MachineCapacities",
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
     *                  @SWG\Items(ref="#/definitions/MachineCapacity")
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
        $machineCapacities = $this->machineCapacityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MachineCapacityResource::collection($machineCapacities), 'Machine Capacities retrieved successfully');
    }

    /**
     * @param CreateMachineCapacityAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/machineCapacities",
     *      summary="Store a newly created MachineCapacity in storage",
     *      tags={"MachineCapacity"},
     *      description="Store MachineCapacity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MachineCapacity that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MachineCapacity")
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
     *                  ref="#/definitions/MachineCapacity"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMachineCapacityAPIRequest $request)
    {
        $input = $request->all();

        $machineCapacity = $this->machineCapacityRepository->create($input);

        return $this->sendResponse(new MachineCapacityResource($machineCapacity), 'Machine Capacity saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/machineCapacities/{id}",
     *      summary="Display the specified MachineCapacity",
     *      tags={"MachineCapacity"},
     *      description="Get MachineCapacity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineCapacity",
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
     *                  ref="#/definitions/MachineCapacity"
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
        /** @var MachineCapacity $machineCapacity */
        $machineCapacity = $this->machineCapacityRepository->find($id);

        if (empty($machineCapacity)) {
            return $this->sendError('Machine Capacity not found');
        }

        return $this->sendResponse(new MachineCapacityResource($machineCapacity), 'Machine Capacity retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMachineCapacityAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/machineCapacities/{id}",
     *      summary="Update the specified MachineCapacity in storage",
     *      tags={"MachineCapacity"},
     *      description="Update MachineCapacity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineCapacity",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MachineCapacity that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MachineCapacity")
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
     *                  ref="#/definitions/MachineCapacity"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMachineCapacityAPIRequest $request)
    {
        $input = $request->all();

        /** @var MachineCapacity $machineCapacity */
        $machineCapacity = $this->machineCapacityRepository->find($id);

        if (empty($machineCapacity)) {
            return $this->sendError('Machine Capacity not found');
        }

        $machineCapacity = $this->machineCapacityRepository->update($input, $id);

        return $this->sendResponse(new MachineCapacityResource($machineCapacity), 'MachineCapacity updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/machineCapacities/{id}",
     *      summary="Remove the specified MachineCapacity from storage",
     *      tags={"MachineCapacity"},
     *      description="Delete MachineCapacity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineCapacity",
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
        /** @var MachineCapacity $machineCapacity */
        $machineCapacity = $this->machineCapacityRepository->find($id);

        if (empty($machineCapacity)) {
            return $this->sendError('Machine Capacity not found');
        }

        $machineCapacity->delete();

        return $this->sendSuccess('Machine Capacity deleted successfully');
    }
}
