<?php

namespace App\Http\Controllers\API\Manufacture;

use App\Http\Requests\API\Manufacture\CreateMachineProductivityAPIRequest;
use App\Http\Requests\API\Manufacture\UpdateMachineProductivityAPIRequest;
use App\Models\Manufacture\MachineProductivity;
use App\Repositories\Manufacture\MachineProductivityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Manufacture\MachineProductivityResource;
use Response;

/**
 * Class MachineProductivityController
 * @package App\Http\Controllers\API\Manufacture
 */

class MachineProductivityAPIController extends AppBaseController
{
    /** @var  MachineProductivityRepository */
    private $machineProductivityRepository;

    public function __construct(MachineProductivityRepository $machineProductivityRepo)
    {
        $this->machineProductivityRepository = $machineProductivityRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/machineProductivities",
     *      summary="Get a listing of the MachineProductivities.",
     *      tags={"MachineProductivity"},
     *      description="Get all MachineProductivities",
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
     *                  @SWG\Items(ref="#/definitions/MachineProductivity")
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
        $machineProductivities = $this->machineProductivityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MachineProductivityResource::collection($machineProductivities), 'Machine Productivities retrieved successfully');
    }

    /**
     * @param CreateMachineProductivityAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/machineProductivities",
     *      summary="Store a newly created MachineProductivity in storage",
     *      tags={"MachineProductivity"},
     *      description="Store MachineProductivity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MachineProductivity that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MachineProductivity")
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
     *                  ref="#/definitions/MachineProductivity"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMachineProductivityAPIRequest $request)
    {
        $input = $request->all();

        $machineProductivity = $this->machineProductivityRepository->create($input);

        return $this->sendResponse(new MachineProductivityResource($machineProductivity), 'Machine Productivity saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/machineProductivities/{id}",
     *      summary="Display the specified MachineProductivity",
     *      tags={"MachineProductivity"},
     *      description="Get MachineProductivity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineProductivity",
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
     *                  ref="#/definitions/MachineProductivity"
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
        /** @var MachineProductivity $machineProductivity */
        $machineProductivity = $this->machineProductivityRepository->find($id);

        if (empty($machineProductivity)) {
            return $this->sendError('Machine Productivity not found');
        }

        return $this->sendResponse(new MachineProductivityResource($machineProductivity), 'Machine Productivity retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMachineProductivityAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/machineProductivities/{id}",
     *      summary="Update the specified MachineProductivity in storage",
     *      tags={"MachineProductivity"},
     *      description="Update MachineProductivity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineProductivity",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MachineProductivity that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MachineProductivity")
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
     *                  ref="#/definitions/MachineProductivity"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMachineProductivityAPIRequest $request)
    {
        $input = $request->all();

        /** @var MachineProductivity $machineProductivity */
        $machineProductivity = $this->machineProductivityRepository->find($id);

        if (empty($machineProductivity)) {
            return $this->sendError('Machine Productivity not found');
        }

        $machineProductivity = $this->machineProductivityRepository->update($input, $id);

        return $this->sendResponse(new MachineProductivityResource($machineProductivity), 'MachineProductivity updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/machineProductivities/{id}",
     *      summary="Remove the specified MachineProductivity from storage",
     *      tags={"MachineProductivity"},
     *      description="Delete MachineProductivity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineProductivity",
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
        /** @var MachineProductivity $machineProductivity */
        $machineProductivity = $this->machineProductivityRepository->find($id);

        if (empty($machineProductivity)) {
            return $this->sendError('Machine Productivity not found');
        }

        $machineProductivity->delete();

        return $this->sendSuccess('Machine Productivity deleted successfully');
    }
}
