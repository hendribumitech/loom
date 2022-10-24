<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Manufacture\MachineProductivity;

class MachineProductivityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_machine_productivity()
    {
        $machineProductivity = MachineProductivity::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/manufacture/machine_productivities', $machineProductivity
        );

        $this->assertApiResponse($machineProductivity);
    }

    /**
     * @test
     */
    public function test_read_machine_productivity()
    {
        $machineProductivity = MachineProductivity::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/manufacture/machine_productivities/'.$machineProductivity->id
        );

        $this->assertApiResponse($machineProductivity->toArray());
    }

    /**
     * @test
     */
    public function test_update_machine_productivity()
    {
        $machineProductivity = MachineProductivity::factory()->create();
        $editedMachineProductivity = MachineProductivity::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/manufacture/machine_productivities/'.$machineProductivity->id,
            $editedMachineProductivity
        );

        $this->assertApiResponse($editedMachineProductivity);
    }

    /**
     * @test
     */
    public function test_delete_machine_productivity()
    {
        $machineProductivity = MachineProductivity::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/manufacture/machine_productivities/'.$machineProductivity->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/manufacture/machine_productivities/'.$machineProductivity->id
        );

        $this->response->assertStatus(404);
    }
}
