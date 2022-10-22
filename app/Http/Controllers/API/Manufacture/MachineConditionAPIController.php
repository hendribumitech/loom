<?php

namespace App\Http\Controllers\API\Manufacture;

use App\Http\Requests\API\Manufacture\CreateMachineConditionAPIRequest;
use App\Http\Requests\API\Manufacture\UpdateMachineConditionAPIRequest;
use App\Models\Manufacture\MachineCondition;
use App\Repositories\Manufacture\MachineConditionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Manufacture\MachineConditionResource;
use Response;

/**
 * Class MachineConditionController
 * @package App\Http\Controllers\API\Manufacture
 */

class MachineConditionAPIController extends AppBaseController
{
    /** @var  MachineConditionRepository */
    private $machineConditionRepository;

    public function __construct(MachineConditionRepository $machineConditionRepo)
    {
        $this->machineConditionRepository = $machineConditionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/machineConditions",
     *      summary="Get a listing of the MachineConditions.",
     *      tags={"MachineCondition"},
     *      description="Get all MachineConditions",
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
     *                  @SWG\Items(ref="#/definitions/MachineCondition")
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
        $machineConditions = $this->machineConditionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MachineConditionResource::collection($machineConditions), 'Machine Conditions retrieved successfully');
    }

    /**
     * @param CreateMachineConditionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/machineConditions",
     *      summary="Store a newly created MachineCondition in storage",
     *      tags={"MachineCondition"},
     *      description="Store MachineCondition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MachineCondition that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MachineCondition")
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
     *                  ref="#/definitions/MachineCondition"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMachineConditionAPIRequest $request)
    {
        $input = $request->all();

        $machineCondition = $this->machineConditionRepository->create($input);

        return $this->sendResponse(new MachineConditionResource($machineCondition), 'Machine Condition saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/machineConditions/{id}",
     *      summary="Display the specified MachineCondition",
     *      tags={"MachineCondition"},
     *      description="Get MachineCondition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineCondition",
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
     *                  ref="#/definitions/MachineCondition"
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
        /** @var MachineCondition $machineCondition */
        $machineCondition = $this->machineConditionRepository->find($id);

        if (empty($machineCondition)) {
            return $this->sendError('Machine Condition not found');
        }

        return $this->sendResponse(new MachineConditionResource($machineCondition), 'Machine Condition retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMachineConditionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/machineConditions/{id}",
     *      summary="Update the specified MachineCondition in storage",
     *      tags={"MachineCondition"},
     *      description="Update MachineCondition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineCondition",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MachineCondition that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MachineCondition")
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
     *                  ref="#/definitions/MachineCondition"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMachineConditionAPIRequest $request)
    {
        $input = $request->all();

        /** @var MachineCondition $machineCondition */
        $machineCondition = $this->machineConditionRepository->find($id);

        if (empty($machineCondition)) {
            return $this->sendError('Machine Condition not found');
        }

        $machineCondition = $this->machineConditionRepository->update($input, $id);

        return $this->sendResponse(new MachineConditionResource($machineCondition), 'MachineCondition updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/machineConditions/{id}",
     *      summary="Remove the specified MachineCondition from storage",
     *      tags={"MachineCondition"},
     *      description="Delete MachineCondition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MachineCondition",
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
        /** @var MachineCondition $machineCondition */
        $machineCondition = $this->machineConditionRepository->find($id);

        if (empty($machineCondition)) {
            return $this->sendError('Machine Condition not found');
        }

        $machineCondition->delete();

        return $this->sendSuccess('Machine Condition deleted successfully');
    }
}
