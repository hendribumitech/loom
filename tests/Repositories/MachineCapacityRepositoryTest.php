<?php namespace Tests\Repositories;

use App\Models\Base\MachineCapacity;
use App\Repositories\Base\MachineCapacityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MachineCapacityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MachineCapacityRepository
     */
    protected $machineCapacityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->machineCapacityRepo = \App::make(MachineCapacityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_machine_capacity()
    {
        $machineCapacity = MachineCapacity::factory()->make()->toArray();

        $createdMachineCapacity = $this->machineCapacityRepo->create($machineCapacity);

        $createdMachineCapacity = $createdMachineCapacity->toArray();
        $this->assertArrayHasKey('id', $createdMachineCapacity);
        $this->assertNotNull($createdMachineCapacity['id'], 'Created MachineCapacity must have id specified');
        $this->assertNotNull(MachineCapacity::find($createdMachineCapacity['id']), 'MachineCapacity with given id must be in DB');
        $this->assertModelData($machineCapacity, $createdMachineCapacity);
    }

    /**
     * @test read
     */
    public function test_read_machine_capacity()
    {
        $machineCapacity = MachineCapacity::factory()->create();

        $dbMachineCapacity = $this->machineCapacityRepo->find($machineCapacity->id);

        $dbMachineCapacity = $dbMachineCapacity->toArray();
        $this->assertModelData($machineCapacity->toArray(), $dbMachineCapacity);
    }

    /**
     * @test update
     */
    public function test_update_machine_capacity()
    {
        $machineCapacity = MachineCapacity::factory()->create();
        $fakeMachineCapacity = MachineCapacity::factory()->make()->toArray();

        $updatedMachineCapacity = $this->machineCapacityRepo->update($fakeMachineCapacity, $machineCapacity->id);

        $this->assertModelData($fakeMachineCapacity, $updatedMachineCapacity->toArray());
        $dbMachineCapacity = $this->machineCapacityRepo->find($machineCapacity->id);
        $this->assertModelData($fakeMachineCapacity, $dbMachineCapacity->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_machine_capacity()
    {
        $machineCapacity = MachineCapacity::factory()->create();

        $resp = $this->machineCapacityRepo->delete($machineCapacity->id);

        $this->assertTrue($resp);
        $this->assertNull(MachineCapacity::find($machineCapacity->id), 'MachineCapacity should not exist in DB');
    }
}
