<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\konten;

class kontenApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_konten()
    {
        $konten = konten::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kontens', $konten
        );

        $this->assertApiResponse($konten);
    }

    /**
     * @test
     */
    public function test_read_konten()
    {
        $konten = konten::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/kontens/'.$konten->id
        );

        $this->assertApiResponse($konten->toArray());
    }

    /**
     * @test
     */
    public function test_update_konten()
    {
        $konten = konten::factory()->create();
        $editedkonten = konten::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kontens/'.$konten->id,
            $editedkonten
        );

        $this->assertApiResponse($editedkonten);
    }

    /**
     * @test
     */
    public function test_delete_konten()
    {
        $konten = konten::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kontens/'.$konten->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kontens/'.$konten->id
        );

        $this->response->assertStatus(404);
    }
}
