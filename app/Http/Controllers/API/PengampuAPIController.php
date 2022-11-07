<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePengampuAPIRequest;
use App\Http\Requests\API\UpdatePengampuAPIRequest;
use App\Models\Pengampu;
use App\Repositories\PengampuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PengampuController
 * @package App\Http\Controllers\API
 */

class PengampuAPIController extends AppBaseController
{
    /** @var  PengampuRepository */
    private $pengampuRepository;

    public function __construct(PengampuRepository $pengampuRepo)
    {
        $this->pengampuRepository = $pengampuRepo;
    }

    /**
     * Display a listing of the Pengampu.
     * GET|HEAD /pengampus
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pengampus = $this->pengampuRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pengampus->toArray(), 'Pengampus retrieved successfully');
    }

    /**
     * Store a newly created Pengampu in storage.
     * POST /pengampus
     *
     * @param CreatePengampuAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePengampuAPIRequest $request)
    {
        $input = $request->all();

        $pengampu = $this->pengampuRepository->create($input);

        return $this->sendResponse($pengampu->toArray(), 'Pengampu saved successfully');
    }

    /**
     * Display the specified Pengampu.
     * GET|HEAD /pengampus/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pengampu $pengampu */
        $pengampu = $this->pengampuRepository->find($id);

        if (empty($pengampu)) {
            return $this->sendError('Pengampu not found');
        }

        return $this->sendResponse($pengampu->toArray(), 'Pengampu retrieved successfully');
    }

    /**
     * Update the specified Pengampu in storage.
     * PUT/PATCH /pengampus/{id}
     *
     * @param int $id
     * @param UpdatePengampuAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePengampuAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pengampu $pengampu */
        $pengampu = $this->pengampuRepository->find($id);

        if (empty($pengampu)) {
            return $this->sendError('Pengampu not found');
        }

        $pengampu = $this->pengampuRepository->update($input, $id);

        return $this->sendResponse($pengampu->toArray(), 'Pengampu updated successfully');
    }

    /**
     * Remove the specified Pengampu from storage.
     * DELETE /pengampus/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pengampu $pengampu */
        $pengampu = $this->pengampuRepository->find($id);

        if (empty($pengampu)) {
            return $this->sendError('Pengampu not found');
        }

        $pengampu->delete();

        return $this->sendSuccess('Pengampu deleted successfully');
    }
}
