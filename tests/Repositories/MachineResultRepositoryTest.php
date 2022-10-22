<?php namespace Tests\Repositories;

use App\Models\Manufacture\MachineResult;
use App\Repositories\Manufacture\MachineResultRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MachineResultRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MachineResultRepository
     */
    protected $machineResultRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->machineResultRepo = \App::make(MachineResultRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_machine_result()
    {
        $machineResult = MachineResult::factory()->make()->toArray();

        $createdMachineResult = $this->machineResultRepo->create($machineResult);

        $createdMachineResult = $createdMachineResult->toArray();
        $this->assertArrayHasKey('id', $createdMachineResult);
        $this->assertNotNull($createdMachineResult['id'], 'Created MachineResult must have id specified');
        $this->assertNotNull(MachineResult::find($createdMachineResult['id']), 'MachineResult with given id must be in DB');
        $this->assertModelData($machineResult, $createdMachineResult);
    }

    /**
     * @test read
     */
    public function test_read_machine_result()
    {
        $machineResult = MachineResult::factory()->create();

        $dbMachineResult = $this->machineResultRepo->find($machineResult->id);

        $dbMachineResult = $dbMachineResult->toArray();
        $this->assertModelData($machineResult->toArray(), $dbMachineResult);
    }

    /**
     * @test update
     */
    public function test_update_machine_result()
    {
        $machineResult = MachineResult::factory()->create();
        $fakeMachineResult = MachineResult::factory()->make()->toArray();

        $updatedMachineResult = $this->machineResultRepo->update($fakeMachineResult, $machineResult->id);

        $this->assertModelData($fakeMachineResult, $updatedMachineResult->toArray());
        $dbMachineResult = $this->machineResultRepo->find($machineResult->id);
        $this->assertModelData($fakeMachineResult, $dbMachineResult->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_machine_result()
    {
        $machineResult = MachineResult::factory()->create();

        $resp = $this->machineResultRepo->delete($machineResult->id);

        $this->assertTrue($resp);
        $this->assertNull(MachineResult::find($machineResult->id), 'MachineResult should not exist in DB');
    }
}
