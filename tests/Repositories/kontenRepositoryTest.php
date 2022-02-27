<?php namespace Tests\Repositories;

use App\Models\konten;
use App\Repositories\kontenRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class kontenRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var kontenRepository
     */
    protected $kontenRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kontenRepo = \App::make(kontenRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_konten()
    {
        $konten = konten::factory()->make()->toArray();

        $createdkonten = $this->kontenRepo->create($konten);

        $createdkonten = $createdkonten->toArray();
        $this->assertArrayHasKey('id', $createdkonten);
        $this->assertNotNull($createdkonten['id'], 'Created konten must have id specified');
        $this->assertNotNull(konten::find($createdkonten['id']), 'konten with given id must be in DB');
        $this->assertModelData($konten, $createdkonten);
    }

    /**
     * @test read
     */
    public function test_read_konten()
    {
        $konten = konten::factory()->create();

        $dbkonten = $this->kontenRepo->find($konten->id);

        $dbkonten = $dbkonten->toArray();
        $this->assertModelData($konten->toArray(), $dbkonten);
    }

    /**
     * @test update
     */
    public function test_update_konten()
    {
        $konten = konten::factory()->create();
        $fakekonten = konten::factory()->make()->toArray();

        $updatedkonten = $this->kontenRepo->update($fakekonten, $konten->id);

        $this->assertModelData($fakekonten, $updatedkonten->toArray());
        $dbkonten = $this->kontenRepo->find($konten->id);
        $this->assertModelData($fakekonten, $dbkonten->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_konten()
    {
        $konten = konten::factory()->create();

        $resp = $this->kontenRepo->delete($konten->id);

        $this->assertTrue($resp);
        $this->assertNull(konten::find($konten->id), 'konten should not exist in DB');
    }
}
