<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Dosen;

class DosenApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dosen()
    {
        $dosen = Dosen::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dosens', $dosen
        );

        $this->assertApiResponse($dosen);
    }

    /**
     * @test
     */
    public function test_read_dosen()
    {
        $dosen = Dosen::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dosens/'.$dosen->id
        );

        $this->assertApiResponse($dosen->toArray());
    }

    /**
     * @test
     */
    public function test_update_dosen()
    {
        $dosen = Dosen::factory()->create();
        $editedDosen = Dosen::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dosens/'.$dosen->id,
            $editedDosen
        );

        $this->assertApiResponse($editedDosen);
    }

    /**
     * @test
     */
    public function test_delete_dosen()
    {
        $dosen = Dosen::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dosens/'.$dosen->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dosens/'.$dosen->id
        );

        $this->response->assertStatus(404);
    }
}
