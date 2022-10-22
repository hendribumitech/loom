<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Base\Machine;

class MachineApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_machine()
    {
        $machine = Machine::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/base/machines', $machine
        );

        $this->assertApiResponse($machine);
    }

    /**
     * @test
     */
    public function test_read_machine()
    {
        $machine = Machine::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/base/machines/'.$machine->id
        );

        $this->assertApiResponse($machine->toArray());
    }

    /**
     * @test
     */
    public function test_update_machine()
    {
        $machine = Machine::factory()->create();
        $editedMachine = Machine::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/base/machines/'.$machine->id,
            $editedMachine
        );

        $this->assertApiResponse($editedMachine);
    }

    /**
     * @test
     */
    public function test_delete_machine()
    {
        $machine = Machine::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/base/machines/'.$machine->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/base/machines/'.$machine->id
        );

        $this->response->assertStatus(404);
    }
}
