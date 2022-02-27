<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\faq;

class faqApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_faq()
    {
        $faq = faq::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/faqs', $faq
        );

        $this->assertApiResponse($faq);
    }

    /**
     * @test
     */
    public function test_read_faq()
    {
        $faq = faq::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/faqs/'.$faq->id
        );

        $this->assertApiResponse($faq->toArray());
    }

    /**
     * @test
     */
    public function test_update_faq()
    {
        $faq = faq::factory()->create();
        $editedfaq = faq::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/faqs/'.$faq->id,
            $editedfaq
        );

        $this->assertApiResponse($editedfaq);
    }

    /**
     * @test
     */
    public function test_delete_faq()
    {
        $faq = faq::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/faqs/'.$faq->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/faqs/'.$faq->id
        );

        $this->response->assertStatus(404);
    }
}
