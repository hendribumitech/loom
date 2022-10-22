<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Manufacture\MachineCondition;

class MachineConditionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_machine_condition()
    {
        $machineCondition = MachineCondition::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/manufacture/machine_conditions', $machineCondition
        );

        $this->assertApiResponse($machineCondition);
    }

    /**
     * @test
     */
    public function test_read_machine_condition()
    {
        $machineCondition = MachineCondition::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/manufacture/machine_conditions/'.$machineCondition->id
        );

        $this->assertApiResponse($machineCondition->toArray());
    }

    /**
     * @test
     */
    public function test_update_machine_condition()
    {
        $machineCondition = MachineCondition::factory()->create();
        $editedMachineCondition = MachineCondition::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/manufacture/machine_conditions/'.$machineCondition->id,
            $editedMachineCondition
        );

        $this->assertApiResponse($editedMachineCondition);
    }

    /**
     * @test
     */
    public function test_delete_machine_condition()
    {
        $machineCondition = MachineCondition::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/manufacture/machine_conditions/'.$machineCondition->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/manufacture/machine_conditions/'.$machineCondition->id
        );

        $this->response->assertStatus(404);
    }
}
