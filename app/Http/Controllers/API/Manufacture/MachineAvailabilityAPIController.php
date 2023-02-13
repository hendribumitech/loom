<?php

namespace App\Http\Controllers\API\Manufacture;

use App\Http\Requests\API\Manufacture\CreateMachineAvailabilityAPIRequest;
use App\Http\Requests\API\Manufacture\UpdateMachineAvailabilityAPIRequest;
use App\Models\Manufacture\MachineAvailability;
use App\Repositories\Manufacture\MachineAvailabilityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Manufacture\MachineAvailabilityResource;
use Response;

/**
 * Class MachineAvailabilityController
 * @package App\Http\Controllers\API\Manufacture
 */

class MachineAvailabilityAPIController extends AppBaseController
{
    /** @var  MachineAvailabilityRepository */
    private $machineAvailabilityRepository;

    public function __construct(MachineAvailabilityRepository $machineAvailabilityRepo)
    {
        $this->machineAvailabilityRepository = $machineAvailabilityRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/machineAvailabilities",
     *      summary="Get a listing of the MachineAvailabilities.",
     *      tags={"MachineAvailability"},
     *      description="Get all MachineAvailabilities",
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
     *                  @SWG\Items(ref="#/definitions/MachineAvailability")
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
        $machineAvailabilities = $this->machineAvailabilityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MachineAvailabilityResource::collection($machineAvailabilities), 'Machine Availabilities retrieved successfully');
    }

    /**
     * @param CreateMachineAvailabilityAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/machineAvailabilities",
     *      summary="Store a newly created MachineAvailability in storage",
     *      tags={"MachineAvailability"},
     *      description="Store MachineAvailability",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MachineAvailability that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MachineAvailability")
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
     *                  ref="#/definitions/MachineAvailability"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMachineAvailabilityAPIRequest $request)
    {
        $input = $request->all();

        $machineAvailability = $this->machineAvailabilityRepository->create($input);

        return $this->sendResponse(new MachineAvailabilityResource($machineAvailability), 'Machine Availability saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/machineAvailabilities/{id}",
     *      summary="Display the specified MachineAvailability",
     *      tags={"MachineAvailability"},
     *      description="Get MachineAvailability",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineAvailability",
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
     *                  ref="#/definitions/MachineAvailability"
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
        /** @var MachineAvailability $machineAvailability */
        $machineAvailability = $this->machineAvailabilityRepository->find($id);

        if (empty($machineAvailability)) {
            return $this->sendError('Machine Availability not found');
        }

        return $this->sendResponse(new MachineAvailabilityResource($machineAvailability), 'Machine Availability retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMachineAvailabilityAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/machineAvailabilities/{id}",
     *      summary="Update the specified MachineAvailability in storage",
     *      tags={"MachineAvailability"},
     *      description="Update MachineAvailability",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineAvailability",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MachineAvailability that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MachineAvailability")
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
     *                  ref="#/definitions/MachineAvailability"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMachineAvailabilityAPIRequest $request)
    {
        $input = $request->all();

        /** @var MachineAvailability $machineAvailability */
        $machineAvailability = $this->machineAvailabilityRepository->find($id);

        if (empty($machineAvailability)) {
            return $this->sendError('Machine Availability not found');
        }

        $machineAvailability = $this->machineAvailabilityRepository->update($input, $id);

        return $this->sendResponse(new MachineAvailabilityResource($machineAvailability), 'MachineAvailability updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/machineAvailabilities/{id}",
     *      summary="Remove the specified MachineAvailability from storage",
     *      tags={"MachineAvailability"},
     *      description="Delete MachineAvailability",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineAvailability",
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
        /** @var MachineAvailability $machineAvailability */
        $machineAvailability = $this->machineAvailabilityRepository->find($id);

        if (empty($machineAvailability)) {
            return $this->sendError('Machine Availability not found');
        }

        $machineAvailability->delete();

        return $this->sendSuccess('Machine Availability deleted successfully');
    }
}
