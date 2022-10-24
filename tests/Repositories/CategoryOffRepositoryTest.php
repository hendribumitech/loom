<?php namespace Tests\Repositories;

use App\Models\Base\CategoryOff;
use App\Repositories\Base\CategoryOffRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CategoryOffRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CategoryOffRepository
     */
    protected $categoryOffRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->categoryOffRepo = \App::make(CategoryOffRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_category_off()
    {
        $categoryOff = CategoryOff::factory()->make()->toArray();

        $createdCategoryOff = $this->categoryOffRepo->create($categoryOff);

        $createdCategoryOff = $createdCategoryOff->toArray();
        $this->assertArrayHasKey('id', $createdCategoryOff);
        $this->assertNotNull($createdCategoryOff['id'], 'Created CategoryOff must have id specified');
        $this->assertNotNull(CategoryOff::find($createdCategoryOff['id']), 'CategoryOff with given id must be in DB');
        $this->assertModelData($categoryOff, $createdCategoryOff);
    }

    /**
     * @test read
     */
    public function test_read_category_off()
    {
        $categoryOff = CategoryOff::factory()->create();

        $dbCategoryOff = $this->categoryOffRepo->find($categoryOff->id);

        $dbCategoryOff = $dbCategoryOff->toArray();
        $this->assertModelData($categoryOff->toArray(), $dbCategoryOff);
    }

    /**
     * @test update
     */
    public function test_update_category_off()
    {
        $categoryOff = CategoryOff::factory()->create();
        $fakeCategoryOff = CategoryOff::factory()->make()->toArray();

        $updatedCategoryOff = $this->categoryOffRepo->update($fakeCategoryOff, $categoryOff->id);

        $this->assertModelData($fakeCategoryOff, $updatedCategoryOff->toArray());
        $dbCategoryOff = $this->categoryOffRepo->find($categoryOff->id);
        $this->assertModelData($fakeCategoryOff, $dbCategoryOff->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_category_off()
    {
        $categoryOff = CategoryOff::factory()->create();

        $resp = $this->categoryOffRepo->delete($categoryOff->id);

        $this->assertTrue($resp);
        $this->assertNull(CategoryOff::find($categoryOff->id), 'CategoryOff should not exist in DB');
    }
}
