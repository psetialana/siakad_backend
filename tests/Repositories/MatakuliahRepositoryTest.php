<?php namespace Tests\Repositories;

use App\Models\Matakuliah;
use App\Repositories\MatakuliahRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MatakuliahRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MatakuliahRepository
     */
    protected $matakuliahRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->matakuliahRepo = \App::make(MatakuliahRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_matakuliah()
    {
        $matakuliah = Matakuliah::factory()->make()->toArray();

        $createdMatakuliah = $this->matakuliahRepo->create($matakuliah);

        $createdMatakuliah = $createdMatakuliah->toArray();
        $this->assertArrayHasKey('id', $createdMatakuliah);
        $this->assertNotNull($createdMatakuliah['id'], 'Created Matakuliah must have id specified');
        $this->assertNotNull(Matakuliah::find($createdMatakuliah['id']), 'Matakuliah with given id must be in DB');
        $this->assertModelData($matakuliah, $createdMatakuliah);
    }

    /**
     * @test read
     */
    public function test_read_matakuliah()
    {
        $matakuliah = Matakuliah::factory()->create();

        $dbMatakuliah = $this->matakuliahRepo->find($matakuliah->id);

        $dbMatakuliah = $dbMatakuliah->toArray();
        $this->assertModelData($matakuliah->toArray(), $dbMatakuliah);
    }

    /**
     * @test update
     */
    public function test_update_matakuliah()
    {
        $matakuliah = Matakuliah::factory()->create();
        $fakeMatakuliah = Matakuliah::factory()->make()->toArray();

        $updatedMatakuliah = $this->matakuliahRepo->update($fakeMatakuliah, $matakuliah->id);

        $this->assertModelData($fakeMatakuliah, $updatedMatakuliah->toArray());
        $dbMatakuliah = $this->matakuliahRepo->find($matakuliah->id);
        $this->assertModelData($fakeMatakuliah, $dbMatakuliah->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_matakuliah()
    {
        $matakuliah = Matakuliah::factory()->create();

        $resp = $this->matakuliahRepo->delete($matakuliah->id);

        $this->assertTrue($resp);
        $this->assertNull(Matakuliah::find($matakuliah->id), 'Matakuliah should not exist in DB');
    }
}
