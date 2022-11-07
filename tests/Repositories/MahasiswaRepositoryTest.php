<?php namespace Tests\Repositories;

use App\Models\Mahasiswa;
use App\Repositories\MahasiswaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MahasiswaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MahasiswaRepository
     */
    protected $mahasiswaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->mahasiswaRepo = \App::make(MahasiswaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_mahasiswa()
    {
        $mahasiswa = Mahasiswa::factory()->make()->toArray();

        $createdMahasiswa = $this->mahasiswaRepo->create($mahasiswa);

        $createdMahasiswa = $createdMahasiswa->toArray();
        $this->assertArrayHasKey('id', $createdMahasiswa);
        $this->assertNotNull($createdMahasiswa['id'], 'Created Mahasiswa must have id specified');
        $this->assertNotNull(Mahasiswa::find($createdMahasiswa['id']), 'Mahasiswa with given id must be in DB');
        $this->assertModelData($mahasiswa, $createdMahasiswa);
    }

    /**
     * @test read
     */
    public function test_read_mahasiswa()
    {
        $mahasiswa = Mahasiswa::factory()->create();

        $dbMahasiswa = $this->mahasiswaRepo->find($mahasiswa->id);

        $dbMahasiswa = $dbMahasiswa->toArray();
        $this->assertModelData($mahasiswa->toArray(), $dbMahasiswa);
    }

    /**
     * @test update
     */
    public function test_update_mahasiswa()
    {
        $mahasiswa = Mahasiswa::factory()->create();
        $fakeMahasiswa = Mahasiswa::factory()->make()->toArray();

        $updatedMahasiswa = $this->mahasiswaRepo->update($fakeMahasiswa, $mahasiswa->id);

        $this->assertModelData($fakeMahasiswa, $updatedMahasiswa->toArray());
        $dbMahasiswa = $this->mahasiswaRepo->find($mahasiswa->id);
        $this->assertModelData($fakeMahasiswa, $dbMahasiswa->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_mahasiswa()
    {
        $mahasiswa = Mahasiswa::factory()->create();

        $resp = $this->mahasiswaRepo->delete($mahasiswa->id);

        $this->assertTrue($resp);
        $this->assertNull(Mahasiswa::find($mahasiswa->id), 'Mahasiswa should not exist in DB');
    }
}
