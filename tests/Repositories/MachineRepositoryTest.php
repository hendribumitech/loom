<?php namespace Tests\Repositories;

use App\Models\Base\Machine;
use App\Repositories\Base\MachineRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MachineRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MachineRepository
     */
    protected $machineRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->machineRepo = \App::make(MachineRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_machine()
    {
        $machine = Machine::factory()->make()->toArray();

        $createdMachine = $this->machineRepo->create($machine);

        $createdMachine = $createdMachine->toArray();
        $this->assertArrayHasKey('id', $createdMachine);
        $this->assertNotNull($createdMachine['id'], 'Created Machine must have id specified');
        $this->assertNotNull(Machine::find($createdMachine['id']), 'Machine with given id must be in DB');
        $this->assertModelData($machine, $createdMachine);
    }

    /**
     * @test read
     */
    public function test_read_machine()
    {
        $machine = Machine::factory()->create();

        $dbMachine = $this->machineRepo->find($machine->id);

        $dbMachine = $dbMachine->toArray();
        $this->assertModelData($machine->toArray(), $dbMachine);
    }

    /**
     * @test update
     */
    public function test_update_machine()
    {
        $machine = Machine::factory()->create();
        $fakeMachine = Machine::factory()->make()->toArray();

        $updatedMachine = $this->machineRepo->update($fakeMachine, $machine->id);

        $this->assertModelData($fakeMachine, $updatedMachine->toArray());
        $dbMachine = $this->machineRepo->find($machine->id);
        $this->assertModelData($fakeMachine, $dbMachine->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_machine()
    {
        $machine = Machine::factory()->create();

        $resp = $this->machineRepo->delete($machine->id);

        $this->assertTrue($resp);
        $this->assertNull(Machine::find($machine->id), 'Machine should not exist in DB');
    }
}
