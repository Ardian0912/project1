<?php namespace Tests\Repositories;

use App\Models\portofolio;
use App\Repositories\portofolioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class portofolioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var portofolioRepository
     */
    protected $portofolioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->portofolioRepo = \App::make(portofolioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_portofolio()
    {
        $portofolio = portofolio::factory()->make()->toArray();

        $createdportofolio = $this->portofolioRepo->create($portofolio);

        $createdportofolio = $createdportofolio->toArray();
        $this->assertArrayHasKey('id', $createdportofolio);
        $this->assertNotNull($createdportofolio['id'], 'Created portofolio must have id specified');
        $this->assertNotNull(portofolio::find($createdportofolio['id']), 'portofolio with given id must be in DB');
        $this->assertModelData($portofolio, $createdportofolio);
    }

    /**
     * @test read
     */
    public function test_read_portofolio()
    {
        $portofolio = portofolio::factory()->create();

        $dbportofolio = $this->portofolioRepo->find($portofolio->id);

        $dbportofolio = $dbportofolio->toArray();
        $this->assertModelData($portofolio->toArray(), $dbportofolio);
    }

    /**
     * @test update
     */
    public function test_update_portofolio()
    {
        $portofolio = portofolio::factory()->create();
        $fakeportofolio = portofolio::factory()->make()->toArray();

        $updatedportofolio = $this->portofolioRepo->update($fakeportofolio, $portofolio->id);

        $this->assertModelData($fakeportofolio, $updatedportofolio->toArray());
        $dbportofolio = $this->portofolioRepo->find($portofolio->id);
        $this->assertModelData($fakeportofolio, $dbportofolio->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_portofolio()
    {
        $portofolio = portofolio::factory()->create();

        $resp = $this->portofolioRepo->delete($portofolio->id);

        $this->assertTrue($resp);
        $this->assertNull(portofolio::find($portofolio->id), 'portofolio should not exist in DB');
    }
}
