<?php namespace Tests\Repositories;

use App\Models\faq;
use App\Repositories\faqRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class faqRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var faqRepository
     */
    protected $faqRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->faqRepo = \App::make(faqRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_faq()
    {
        $faq = faq::factory()->make()->toArray();

        $createdfaq = $this->faqRepo->create($faq);

        $createdfaq = $createdfaq->toArray();
        $this->assertArrayHasKey('id', $createdfaq);
        $this->assertNotNull($createdfaq['id'], 'Created faq must have id specified');
        $this->assertNotNull(faq::find($createdfaq['id']), 'faq with given id must be in DB');
        $this->assertModelData($faq, $createdfaq);
    }

    /**
     * @test read
     */
    public function test_read_faq()
    {
        $faq = faq::factory()->create();

        $dbfaq = $this->faqRepo->find($faq->id);

        $dbfaq = $dbfaq->toArray();
        $this->assertModelData($faq->toArray(), $dbfaq);
    }

    /**
     * @test update
     */
    public function test_update_faq()
    {
        $faq = faq::factory()->create();
        $fakefaq = faq::factory()->make()->toArray();

        $updatedfaq = $this->faqRepo->update($fakefaq, $faq->id);

        $this->assertModelData($fakefaq, $updatedfaq->toArray());
        $dbfaq = $this->faqRepo->find($faq->id);
        $this->assertModelData($fakefaq, $dbfaq->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_faq()
    {
        $faq = faq::factory()->create();

        $resp = $this->faqRepo->delete($faq->id);

        $this->assertTrue($resp);
        $this->assertNull(faq::find($faq->id), 'faq should not exist in DB');
    }
}
