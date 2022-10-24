<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Base\MachineCapacity;

class MachineCapacityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_machine_capacity()
    {
        $machineCapacity = MachineCapacity::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/base/machine_capacities', $machineCapacity
        );

        $this->assertApiResponse($machineCapacity);
    }

    /**
     * @test
     */
    public function test_read_machine_capacity()
    {
        $machineCapacity = MachineCapacity::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/base/machine_capacities/'.$machineCapacity->id
        );

        $this->assertApiResponse($machineCapacity->toArray());
    }

    /**
     * @test
     */
    public function test_update_machine_capacity()
    {
        $machineCapacity = MachineCapacity::factory()->create();
        $editedMachineCapacity = MachineCapacity::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/base/machine_capacities/'.$machineCapacity->id,
            $editedMachineCapacity
        );

        $this->assertApiResponse($editedMachineCapacity);
    }

    /**
     * @test
     */
    public function test_delete_machine_capacity()
    {
        $machineCapacity = MachineCapacity::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/base/machine_capacities/'.$machineCapacity->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/base/machine_capacities/'.$machineCapacity->id
        );

        $this->response->assertStatus(404);
    }
}
