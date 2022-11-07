<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Matakuliah;

class MatakuliahApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_matakuliah()
    {
        $matakuliah = Matakuliah::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/matakuliahs', $matakuliah
        );

        $this->assertApiResponse($matakuliah);
    }

    /**
     * @test
     */
    public function test_read_matakuliah()
    {
        $matakuliah = Matakuliah::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/matakuliahs/'.$matakuliah->id
        );

        $this->assertApiResponse($matakuliah->toArray());
    }

    /**
     * @test
     */
    public function test_update_matakuliah()
    {
        $matakuliah = Matakuliah::factory()->create();
        $editedMatakuliah = Matakuliah::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/matakuliahs/'.$matakuliah->id,
            $editedMatakuliah
        );

        $this->assertApiResponse($editedMatakuliah);
    }

    /**
     * @test
     */
    public function test_delete_matakuliah()
    {
        $matakuliah = Matakuliah::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/matakuliahs/'.$matakuliah->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/matakuliahs/'.$matakuliah->id
        );

        $this->response->assertStatus(404);
    }
}
