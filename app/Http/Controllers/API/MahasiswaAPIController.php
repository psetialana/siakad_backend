<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMahasiswaAPIRequest;
use App\Http\Requests\API\UpdateMahasiswaAPIRequest;
use App\Models\Mahasiswa;
use App\Repositories\MahasiswaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MahasiswaController
 * @package App\Http\Controllers\API
 */

class MahasiswaAPIController extends AppBaseController
{
    /** @var  MahasiswaRepository */
    private $mahasiswaRepository;

    public function __construct(MahasiswaRepository $mahasiswaRepo)
    {
        $this->mahasiswaRepository = $mahasiswaRepo;
    }

    /**
     * Display a listing of the Mahasiswa.
     * GET|HEAD /mahasiswas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $mahasiswas = $this->mahasiswaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($mahasiswas->toArray(), 'Mahasiswas retrieved successfully');
    }

    /**
     * Store a newly created Mahasiswa in storage.
     * POST /mahasiswas
     *
     * @param CreateMahasiswaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMahasiswaAPIRequest $request)
    {
        $input = $request->all();

        $mahasiswa = $this->mahasiswaRepository->create($input);

        return $this->sendResponse($mahasiswa->toArray(), 'Mahasiswa saved successfully');
    }

    /**
     * Display the specified Mahasiswa.
     * GET|HEAD /mahasiswas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Mahasiswa $mahasiswa */
        $mahasiswa = $this->mahasiswaRepository->find($id);

        if (empty($mahasiswa)) {
            return $this->sendError('Mahasiswa not found');
        }

        return $this->sendResponse($mahasiswa->toArray(), 'Mahasiswa retrieved successfully');
    }

    /**
     * Update the specified Mahasiswa in storage.
     * PUT/PATCH /mahasiswas/{id}
     *
     * @param int $id
     * @param UpdateMahasiswaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMahasiswaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Mahasiswa $mahasiswa */
        $mahasiswa = $this->mahasiswaRepository->find($id);

        if (empty($mahasiswa)) {
            return $this->sendError('Mahasiswa not found');
        }

        $mahasiswa = $this->mahasiswaRepository->update($input, $id);

        return $this->sendResponse($mahasiswa->toArray(), 'Mahasiswa updated successfully');
    }

    /**
     * Remove the specified Mahasiswa from storage.
     * DELETE /mahasiswas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Mahasiswa $mahasiswa */
        $mahasiswa = $this->mahasiswaRepository->find($id);

        if (empty($mahasiswa)) {
            return $this->sendError('Mahasiswa not found');
        }

        $mahasiswa->delete();

        return $this->sendSuccess('Mahasiswa deleted successfully');
    }
}
