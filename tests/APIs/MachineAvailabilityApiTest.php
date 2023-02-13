<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Manufacture\MachineAvailability;

class MachineAvailabilityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_machine_availability()
    {
        $machineAvailability = MachineAvailability::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/manufacture/machine_availabilities', $machineAvailability
        );

        $this->assertApiResponse($machineAvailability);
    }

    /**
     * @test
     */
    public function test_read_machine_availability()
    {
        $machineAvailability = MachineAvailability::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/manufacture/machine_availabilities/'.$machineAvailability->id
        );

        $this->assertApiResponse($machineAvailability->toArray());
    }

    /**
     * @test
     */
    public function test_update_machine_availability()
    {
        $machineAvailability = MachineAvailability::factory()->create();
        $editedMachineAvailability = MachineAvailability::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/manufacture/machine_availabilities/'.$machineAvailability->id,
            $editedMachineAvailability
        );

        $this->assertApiResponse($editedMachineAvailability);
    }

    /**
     * @test
     */
    public function test_delete_machine_availability()
    {
        $machineAvailability = MachineAvailability::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/manufacture/machine_availabilities/'.$machineAvailability->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/manufacture/machine_availabilities/'.$machineAvailability->id
        );

        $this->response->assertStatus(404);
    }
}
