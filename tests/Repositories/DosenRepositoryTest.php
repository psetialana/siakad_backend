<?php namespace Tests\Repositories;

use App\Models\Dosen;
use App\Repositories\DosenRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DosenRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DosenRepository
     */
    protected $dosenRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dosenRepo = \App::make(DosenRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dosen()
    {
        $dosen = Dosen::factory()->make()->toArray();

        $createdDosen = $this->dosenRepo->create($dosen);

        $createdDosen = $createdDosen->toArray();
        $this->assertArrayHasKey('id', $createdDosen);
        $this->assertNotNull($createdDosen['id'], 'Created Dosen must have id specified');
        $this->assertNotNull(Dosen::find($createdDosen['id']), 'Dosen with given id must be in DB');
        $this->assertModelData($dosen, $createdDosen);
    }

    /**
     * @test read
     */
    public function test_read_dosen()
    {
        $dosen = Dosen::factory()->create();

        $dbDosen = $this->dosenRepo->find($dosen->id);

        $dbDosen = $dbDosen->toArray();
        $this->assertModelData($dosen->toArray(), $dbDosen);
    }

    /**
     * @test update
     */
    public function test_update_dosen()
    {
        $dosen = Dosen::factory()->create();
        $fakeDosen = Dosen::factory()->make()->toArray();

        $updatedDosen = $this->dosenRepo->update($fakeDosen, $dosen->id);

        $this->assertModelData($fakeDosen, $updatedDosen->toArray());
        $dbDosen = $this->dosenRepo->find($dosen->id);
        $this->assertModelData($fakeDosen, $dbDosen->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dosen()
    {
        $dosen = Dosen::factory()->create();

        $resp = $this->dosenRepo->delete($dosen->id);

        $this->assertTrue($resp);
        $this->assertNull(Dosen::find($dosen->id), 'Dosen should not exist in DB');
    }
}
