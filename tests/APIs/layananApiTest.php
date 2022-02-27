<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\layanan;

class layananApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_layanan()
    {
        $layanan = layanan::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/layanans', $layanan
        );

        $this->assertApiResponse($layanan);
    }

    /**
     * @test
     */
    public function test_read_layanan()
    {
        $layanan = layanan::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/layanans/'.$layanan->id
        );

        $this->assertApiResponse($layanan->toArray());
    }

    /**
     * @test
     */
    public function test_update_layanan()
    {
        $layanan = layanan::factory()->create();
        $editedlayanan = layanan::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/layanans/'.$layanan->id,
            $editedlayanan
        );

        $this->assertApiResponse($editedlayanan);
    }

    /**
     * @test
     */
    public function test_delete_layanan()
    {
        $layanan = layanan::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/layanans/'.$layanan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/layanans/'.$layanan->id
        );

        $this->response->assertStatus(404);
    }
}
