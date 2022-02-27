<?php namespace Tests\Repositories;

use App\Models\kontak;
use App\Repositories\kontakRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class kontakRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var kontakRepository
     */
    protected $kontakRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kontakRepo = \App::make(kontakRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kontak()
    {
        $kontak = kontak::factory()->make()->toArray();

        $createdkontak = $this->kontakRepo->create($kontak);

        $createdkontak = $createdkontak->toArray();
        $this->assertArrayHasKey('id', $createdkontak);
        $this->assertNotNull($createdkontak['id'], 'Created kontak must have id specified');
        $this->assertNotNull(kontak::find($createdkontak['id']), 'kontak with given id must be in DB');
        $this->assertModelData($kontak, $createdkontak);
    }

    /**
     * @test read
     */
    public function test_read_kontak()
    {
        $kontak = kontak::factory()->create();

        $dbkontak = $this->kontakRepo->find($kontak->id);

        $dbkontak = $dbkontak->toArray();
        $this->assertModelData($kontak->toArray(), $dbkontak);
    }

    /**
     * @test update
     */
    public function test_update_kontak()
    {
        $kontak = kontak::factory()->create();
        $fakekontak = kontak::factory()->make()->toArray();

        $updatedkontak = $this->kontakRepo->update($fakekontak, $kontak->id);

        $this->assertModelData($fakekontak, $updatedkontak->toArray());
        $dbkontak = $this->kontakRepo->find($kontak->id);
        $this->assertModelData($fakekontak, $dbkontak->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kontak()
    {
        $kontak = kontak::factory()->create();

        $resp = $this->kontakRepo->delete($kontak->id);

        $this->assertTrue($resp);
        $this->assertNull(kontak::find($kontak->id), 'kontak should not exist in DB');
    }
}
