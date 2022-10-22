<?php namespace Tests\Repositories;

use App\Models\Manufacture\MachineCondition;
use App\Repositories\Manufacture\MachineConditionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MachineConditionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MachineConditionRepository
     */
    protected $machineConditionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->machineConditionRepo = \App::make(MachineConditionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_machine_condition()
    {
        $machineCondition = MachineCondition::factory()->make()->toArray();

        $createdMachineCondition = $this->machineConditionRepo->create($machineCondition);

        $createdMachineCondition = $createdMachineCondition->toArray();
        $this->assertArrayHasKey('id', $createdMachineCondition);
        $this->assertNotNull($createdMachineCondition['id'], 'Created MachineCondition must have id specified');
        $this->assertNotNull(MachineCondition::find($createdMachineCondition['id']), 'MachineCondition with given id must be in DB');
        $this->assertModelData($machineCondition, $createdMachineCondition);
    }

    /**
     * @test read
     */
    public function test_read_machine_condition()
    {
        $machineCondition = MachineCondition::factory()->create();

        $dbMachineCondition = $this->machineConditionRepo->find($machineCondition->id);

        $dbMachineCondition = $dbMachineCondition->toArray();
        $this->assertModelData($machineCondition->toArray(), $dbMachineCondition);
    }

    /**
     * @test update
     */
    public function test_update_machine_condition()
    {
        $machineCondition = MachineCondition::factory()->create();
        $fakeMachineCondition = MachineCondition::factory()->make()->toArray();

        $updatedMachineCondition = $this->machineConditionRepo->update($fakeMachineCondition, $machineCondition->id);

        $this->assertModelData($fakeMachineCondition, $updatedMachineCondition->toArray());
        $dbMachineCondition = $this->machineConditionRepo->find($machineCondition->id);
        $this->assertModelData($fakeMachineCondition, $dbMachineCondition->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_machine_condition()
    {
        $machineCondition = MachineCondition::factory()->create();

        $resp = $this->machineConditionRepo->delete($machineCondition->id);

        $this->assertTrue($resp);
        $this->assertNull(MachineCondition::find($machineCondition->id), 'MachineCondition should not exist in DB');
    }
}
