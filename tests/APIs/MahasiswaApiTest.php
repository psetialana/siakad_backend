<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Mahasiswa;

class MahasiswaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_mahasiswa()
    {
        $mahasiswa = Mahasiswa::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/mahasiswas', $mahasiswa
        );

        $this->assertApiResponse($mahasiswa);
    }

    /**
     * @test
     */
    public function test_read_mahasiswa()
    {
        $mahasiswa = Mahasiswa::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/mahasiswas/'.$mahasiswa->id
        );

        $this->assertApiResponse($mahasiswa->toArray());
    }

    /**
     * @test
     */
    public function test_update_mahasiswa()
    {
        $mahasiswa = Mahasiswa::factory()->create();
        $editedMahasiswa = Mahasiswa::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/mahasiswas/'.$mahasiswa->id,
            $editedMahasiswa
        );

        $this->assertApiResponse($editedMahasiswa);
    }

    /**
     * @test
     */
    public function test_delete_mahasiswa()
    {
        $mahasiswa = Mahasiswa::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/mahasiswas/'.$mahasiswa->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/mahasiswas/'.$mahasiswa->id
        );

        $this->response->assertStatus(404);
    }
}
