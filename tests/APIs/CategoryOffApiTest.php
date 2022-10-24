<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Base\CategoryOff;

class CategoryOffApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_category_off()
    {
        $categoryOff = CategoryOff::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/base/category_offs', $categoryOff
        );

        $this->assertApiResponse($categoryOff);
    }

    /**
     * @test
     */
    public function test_read_category_off()
    {
        $categoryOff = CategoryOff::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/base/category_offs/'.$categoryOff->id
        );

        $this->assertApiResponse($categoryOff->toArray());
    }

    /**
     * @test
     */
    public function test_update_category_off()
    {
        $categoryOff = CategoryOff::factory()->create();
        $editedCategoryOff = CategoryOff::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/base/category_offs/'.$categoryOff->id,
            $editedCategoryOff
        );

        $this->assertApiResponse($editedCategoryOff);
    }

    /**
     * @test
     */
    public function test_delete_category_off()
    {
        $categoryOff = CategoryOff::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/base/category_offs/'.$categoryOff->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/base/category_offs/'.$categoryOff->id
        );

        $this->response->assertStatus(404);
    }
}
