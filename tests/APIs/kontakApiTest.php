<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\kontak;

class kontakApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kontak()
    {
        $kontak = kontak::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kontaks', $kontak
        );

        $this->assertApiResponse($kontak);
    }

    /**
     * @test
     */
    public function test_read_kontak()
    {
        $kontak = kontak::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/kontaks/'.$kontak->id
        );

        $this->assertApiResponse($kontak->toArray());
    }

    /**
     * @test
     */
    public function test_update_kontak()
    {
        $kontak = kontak::factory()->create();
        $editedkontak = kontak::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kontaks/'.$kontak->id,
            $editedkontak
        );

        $this->assertApiResponse($editedkontak);
    }

    /**
     * @test
     */
    public function test_delete_kontak()
    {
        $kontak = kontak::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kontaks/'.$kontak->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kontaks/'.$kontak->id
        );

        $this->response->assertStatus(404);
    }
}
