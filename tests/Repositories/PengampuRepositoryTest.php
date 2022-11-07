<?php namespace Tests\Repositories;

use App\Models\Pengampu;
use App\Repositories\PengampuRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PengampuRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PengampuRepository
     */
    protected $pengampuRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pengampuRepo = \App::make(PengampuRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pengampu()
    {
        $pengampu = Pengampu::factory()->make()->toArray();

        $createdPengampu = $this->pengampuRepo->create($pengampu);

        $createdPengampu = $createdPengampu->toArray();
        $this->assertArrayHasKey('id', $createdPengampu);
        $this->assertNotNull($createdPengampu['id'], 'Created Pengampu must have id specified');
        $this->assertNotNull(Pengampu::find($createdPengampu['id']), 'Pengampu with given id must be in DB');
        $this->assertModelData($pengampu, $createdPengampu);
    }

    /**
     * @test read
     */
    public function test_read_pengampu()
    {
        $pengampu = Pengampu::factory()->create();

        $dbPengampu = $this->pengampuRepo->find($pengampu->id);

        $dbPengampu = $dbPengampu->toArray();
        $this->assertModelData($pengampu->toArray(), $dbPengampu);
    }

    /**
     * @test update
     */
    public function test_update_pengampu()
    {
        $pengampu = Pengampu::factory()->create();
        $fakePengampu = Pengampu::factory()->make()->toArray();

        $updatedPengampu = $this->pengampuRepo->update($fakePengampu, $pengampu->id);

        $this->assertModelData($fakePengampu, $updatedPengampu->toArray());
        $dbPengampu = $this->pengampuRepo->find($pengampu->id);
        $this->assertModelData($fakePengampu, $dbPengampu->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pengampu()
    {
        $pengampu = Pengampu::factory()->create();

        $resp = $this->pengampuRepo->delete($pengampu->id);

        $this->assertTrue($resp);
        $this->assertNull(Pengampu::find($pengampu->id), 'Pengampu should not exist in DB');
    }
}
