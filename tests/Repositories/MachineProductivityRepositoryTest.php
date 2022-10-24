<?php namespace Tests\Repositories;

use App\Models\Manufacture\MachineProductivity;
use App\Repositories\Manufacture\MachineProductivityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MachineProductivityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MachineProductivityRepository
     */
    protected $machineProductivityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->machineProductivityRepo = \App::make(MachineProductivityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_machine_productivity()
    {
        $machineProductivity = MachineProductivity::factory()->make()->toArray();

        $createdMachineProductivity = $this->machineProductivityRepo->create($machineProductivity);

        $createdMachineProductivity = $createdMachineProductivity->toArray();
        $this->assertArrayHasKey('id', $createdMachineProductivity);
        $this->assertNotNull($createdMachineProductivity['id'], 'Created MachineProductivity must have id specified');
        $this->assertNotNull(MachineProductivity::find($createdMachineProductivity['id']), 'MachineProductivity with given id must be in DB');
        $this->assertModelData($machineProductivity, $createdMachineProductivity);
    }

    /**
     * @test read
     */
    public function test_read_machine_productivity()
    {
        $machineProductivity = MachineProductivity::factory()->create();

        $dbMachineProductivity = $this->machineProductivityRepo->find($machineProductivity->id);

        $dbMachineProductivity = $dbMachineProductivity->toArray();
        $this->assertModelData($machineProductivity->toArray(), $dbMachineProductivity);
    }

    /**
     * @test update
     */
    public function test_update_machine_productivity()
    {
        $machineProductivity = MachineProductivity::factory()->create();
        $fakeMachineProductivity = MachineProductivity::factory()->make()->toArray();

        $updatedMachineProductivity = $this->machineProductivityRepo->update($fakeMachineProductivity, $machineProductivity->id);

        $this->assertModelData($fakeMachineProductivity, $updatedMachineProductivity->toArray());
        $dbMachineProductivity = $this->machineProductivityRepo->find($machineProductivity->id);
        $this->assertModelData($fakeMachineProductivity, $dbMachineProductivity->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_machine_productivity()
    {
        $machineProductivity = MachineProductivity::factory()->create();

        $resp = $this->machineProductivityRepo->delete($machineProductivity->id);

        $this->assertTrue($resp);
        $this->assertNull(MachineProductivity::find($machineProductivity->id), 'MachineProductivity should not exist in DB');
    }
}
