<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\portofolio;

class portofolioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_portofolio()
    {
        $portofolio = portofolio::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/portofolios', $portofolio
        );

        $this->assertApiResponse($portofolio);
    }

    /**
     * @test
     */
    public function test_read_portofolio()
    {
        $portofolio = portofolio::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/portofolios/'.$portofolio->id
        );

        $this->assertApiResponse($portofolio->toArray());
    }

    /**
     * @test
     */
    public function test_update_portofolio()
    {
        $portofolio = portofolio::factory()->create();
        $editedportofolio = portofolio::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/portofolios/'.$portofolio->id,
            $editedportofolio
        );

        $this->assertApiResponse($editedportofolio);
    }

    /**
     * @test
     */
    public function test_delete_portofolio()
    {
        $portofolio = portofolio::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/portofolios/'.$portofolio->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/portofolios/'.$portofolio->id
        );

        $this->response->assertStatus(404);
    }
}
