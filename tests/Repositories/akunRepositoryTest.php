<?php namespace Tests\Repositories;

use App\Models\akun;
use App\Repositories\akunRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class akunRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var akunRepository
     */
    protected $akunRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->akunRepo = \App::make(akunRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_akun()
    {
        $akun = akun::factory()->make()->toArray();

        $createdakun = $this->akunRepo->create($akun);

        $createdakun = $createdakun->toArray();
        $this->assertArrayHasKey('id', $createdakun);
        $this->assertNotNull($createdakun['id'], 'Created akun must have id specified');
        $this->assertNotNull(akun::find($createdakun['id']), 'akun with given id must be in DB');
        $this->assertModelData($akun, $createdakun);
    }

    /**
     * @test read
     */
    public function test_read_akun()
    {
        $akun = akun::factory()->create();

        $dbakun = $this->akunRepo->find($akun->id);

        $dbakun = $dbakun->toArray();
        $this->assertModelData($akun->toArray(), $dbakun);
    }

    /**
     * @test update
     */
    public function test_update_akun()
    {
        $akun = akun::factory()->create();
        $fakeakun = akun::factory()->make()->toArray();

        $updatedakun = $this->akunRepo->update($fakeakun, $akun->id);

        $this->assertModelData($fakeakun, $updatedakun->toArray());
        $dbakun = $this->akunRepo->find($akun->id);
        $this->assertModelData($fakeakun, $dbakun->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_akun()
    {
        $akun = akun::factory()->create();

        $resp = $this->akunRepo->delete($akun->id);

        $this->assertTrue($resp);
        $this->assertNull(akun::find($akun->id), 'akun should not exist in DB');
    }
}
