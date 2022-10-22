<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Manufacture\MachineResult;

class MachineResultApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_machine_result()
    {
        $machineResult = MachineResult::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/manufacture/machine_results', $machineResult
        );

        $this->assertApiResponse($machineResult);
    }

    /**
     * @test
     */
    public function test_read_machine_result()
    {
        $machineResult = MachineResult::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/manufacture/machine_results/'.$machineResult->id
        );

        $this->assertApiResponse($machineResult->toArray());
    }

    /**
     * @test
     */
    public function test_update_machine_result()
    {
        $machineResult = MachineResult::factory()->create();
        $editedMachineResult = MachineResult::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/manufacture/machine_results/'.$machineResult->id,
            $editedMachineResult
        );

        $this->assertApiResponse($editedMachineResult);
    }

    /**
     * @test
     */
    public function test_delete_machine_result()
    {
        $machineResult = MachineResult::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/manufacture/machine_results/'.$machineResult->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/manufacture/machine_results/'.$machineResult->id
        );

        $this->response->assertStatus(404);
    }
}
