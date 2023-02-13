<?php namespace Tests\Repositories;

use App\Models\Manufacture\MachineAvailability;
use App\Repositories\Manufacture\MachineAvailabilityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MachineAvailabilityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MachineAvailabilityRepository
     */
    protected $machineAvailabilityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->machineAvailabilityRepo = \App::make(MachineAvailabilityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_machine_availability()
    {
        $machineAvailability = MachineAvailability::factory()->make()->toArray();

        $createdMachineAvailability = $this->machineAvailabilityRepo->create($machineAvailability);

        $createdMachineAvailability = $createdMachineAvailability->toArray();
        $this->assertArrayHasKey('id', $createdMachineAvailability);
        $this->assertNotNull($createdMachineAvailability['id'], 'Created MachineAvailability must have id specified');
        $this->assertNotNull(MachineAvailability::find($createdMachineAvailability['id']), 'MachineAvailability with given id must be in DB');
        $this->assertModelData($machineAvailability, $createdMachineAvailability);
    }

    /**
     * @test read
     */
    public function test_read_machine_availability()
    {
        $machineAvailability = MachineAvailability::factory()->create();

        $dbMachineAvailability = $this->machineAvailabilityRepo->find($machineAvailability->id);

        $dbMachineAvailability = $dbMachineAvailability->toArray();
        $this->assertModelData($machineAvailability->toArray(), $dbMachineAvailability);
    }

    /**
     * @test update
     */
    public function test_update_machine_availability()
    {
        $machineAvailability = MachineAvailability::factory()->create();
        $fakeMachineAvailability = MachineAvailability::factory()->make()->toArray();

        $updatedMachineAvailability = $this->machineAvailabilityRepo->update($fakeMachineAvailability, $machineAvailability->id);

        $this->assertModelData($fakeMachineAvailability, $updatedMachineAvailability->toArray());
        $dbMachineAvailability = $this->machineAvailabilityRepo->find($machineAvailability->id);
        $this->assertModelData($fakeMachineAvailability, $dbMachineAvailability->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_machine_availability()
    {
        $machineAvailability = MachineAvailability::factory()->create();

        $resp = $this->machineAvailabilityRepo->delete($machineAvailability->id);

        $this->assertTrue($resp);
        $this->assertNull(MachineAvailability::find($machineAvailability->id), 'MachineAvailability should not exist in DB');
    }
}
