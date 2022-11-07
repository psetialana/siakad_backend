<?php namespace Tests\Repositories;

use App\Models\Krs;
use App\Repositories\KrsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KrsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KrsRepository
     */
    protected $krsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->krsRepo = \App::make(KrsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_krs()
    {
        $krs = Krs::factory()->make()->toArray();

        $createdKrs = $this->krsRepo->create($krs);

        $createdKrs = $createdKrs->toArray();
        $this->assertArrayHasKey('id', $createdKrs);
        $this->assertNotNull($createdKrs['id'], 'Created Krs must have id specified');
        $this->assertNotNull(Krs::find($createdKrs['id']), 'Krs with given id must be in DB');
        $this->assertModelData($krs, $createdKrs);
    }

    /**
     * @test read
     */
    public function test_read_krs()
    {
        $krs = Krs::factory()->create();

        $dbKrs = $this->krsRepo->find($krs->id);

        $dbKrs = $dbKrs->toArray();
        $this->assertModelData($krs->toArray(), $dbKrs);
    }

    /**
     * @test update
     */
    public function test_update_krs()
    {
        $krs = Krs::factory()->create();
        $fakeKrs = Krs::factory()->make()->toArray();

        $updatedKrs = $this->krsRepo->update($fakeKrs, $krs->id);

        $this->assertModelData($fakeKrs, $updatedKrs->toArray());
        $dbKrs = $this->krsRepo->find($krs->id);
        $this->assertModelData($fakeKrs, $dbKrs->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_krs()
    {
        $krs = Krs::factory()->create();

        $resp = $this->krsRepo->delete($krs->id);

        $this->assertTrue($resp);
        $this->assertNull(Krs::find($krs->id), 'Krs should not exist in DB');
    }
}
