<?php namespace Tests\Repositories;

use App\Models\layanan;
use App\Repositories\layananRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class layananRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var layananRepository
     */
    protected $layananRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->layananRepo = \App::make(layananRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_layanan()
    {
        $layanan = layanan::factory()->make()->toArray();

        $createdlayanan = $this->layananRepo->create($layanan);

        $createdlayanan = $createdlayanan->toArray();
        $this->assertArrayHasKey('id', $createdlayanan);
        $this->assertNotNull($createdlayanan['id'], 'Created layanan must have id specified');
        $this->assertNotNull(layanan::find($createdlayanan['id']), 'layanan with given id must be in DB');
        $this->assertModelData($layanan, $createdlayanan);
    }

    /**
     * @test read
     */
    public function test_read_layanan()
    {
        $layanan = layanan::factory()->create();

        $dblayanan = $this->layananRepo->find($layanan->id);

        $dblayanan = $dblayanan->toArray();
        $this->assertModelData($layanan->toArray(), $dblayanan);
    }

    /**
     * @test update
     */
    public function test_update_layanan()
    {
        $layanan = layanan::factory()->create();
        $fakelayanan = layanan::factory()->make()->toArray();

        $updatedlayanan = $this->layananRepo->update($fakelayanan, $layanan->id);

        $this->assertModelData($fakelayanan, $updatedlayanan->toArray());
        $dblayanan = $this->layananRepo->find($layanan->id);
        $this->assertModelData($fakelayanan, $dblayanan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_layanan()
    {
        $layanan = layanan::factory()->create();

        $resp = $this->layananRepo->delete($layanan->id);

        $this->assertTrue($resp);
        $this->assertNull(layanan::find($layanan->id), 'layanan should not exist in DB');
    }
}
