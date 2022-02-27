<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\akun;

class akunApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_akun()
    {
        $akun = akun::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/akuns', $akun
        );

        $this->assertApiResponse($akun);
    }

    /**
     * @test
     */
    public function test_read_akun()
    {
        $akun = akun::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/akuns/'.$akun->id
        );

        $this->assertApiResponse($akun->toArray());
    }

    /**
     * @test
     */
    public function test_update_akun()
    {
        $akun = akun::factory()->create();
        $editedakun = akun::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/akuns/'.$akun->id,
            $editedakun
        );

        $this->assertApiResponse($editedakun);
    }

    /**
     * @test
     */
    public function test_delete_akun()
    {
        $akun = akun::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/akuns/'.$akun->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/akuns/'.$akun->id
        );

        $this->response->assertStatus(404);
    }
}
