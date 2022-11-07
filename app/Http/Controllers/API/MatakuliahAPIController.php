<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMatakuliahAPIRequest;
use App\Http\Requests\API\UpdateMatakuliahAPIRequest;
use App\Models\Matakuliah;
use App\Repositories\MatakuliahRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MatakuliahController
 * @package App\Http\Controllers\API
 */

class MatakuliahAPIController extends AppBaseController
{
    /** @var  MatakuliahRepository */
    private $matakuliahRepository;

    public function __construct(MatakuliahRepository $matakuliahRepo)
    {
        $this->matakuliahRepository = $matakuliahRepo;
    }

    /**
     * Display a listing of the Matakuliah.
     * GET|HEAD /matakuliahs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $matakuliahs = $this->matakuliahRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($matakuliahs->toArray(), 'Matakuliahs retrieved successfully');
    }

    /**
     * Store a newly created Matakuliah in storage.
     * POST /matakuliahs
     *
     * @param CreateMatakuliahAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMatakuliahAPIRequest $request)
    {
        $input = $request->all();

        $matakuliah = $this->matakuliahRepository->create($input);

        return $this->sendResponse($matakuliah->toArray(), 'Matakuliah saved successfully');
    }

    /**
     * Display the specified Matakuliah.
     * GET|HEAD /matakuliahs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Matakuliah $matakuliah */
        $matakuliah = $this->matakuliahRepository->find($id);

        if (empty($matakuliah)) {
            return $this->sendError('Matakuliah not found');
        }

        return $this->sendResponse($matakuliah->toArray(), 'Matakuliah retrieved successfully');
    }

    /**
     * Update the specified Matakuliah in storage.
     * PUT/PATCH /matakuliahs/{id}
     *
     * @param int $id
     * @param UpdateMatakuliahAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatakuliahAPIRequest $request)
    {
        $input = $request->all();

        /** @var Matakuliah $matakuliah */
        $matakuliah = $this->matakuliahRepository->find($id);

        if (empty($matakuliah)) {
            return $this->sendError('Matakuliah not found');
        }

        $matakuliah = $this->matakuliahRepository->update($input, $id);

        return $this->sendResponse($matakuliah->toArray(), 'Matakuliah updated successfully');
    }

    /**
     * Remove the specified Matakuliah from storage.
     * DELETE /matakuliahs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Matakuliah $matakuliah */
        $matakuliah = $this->matakuliahRepository->find($id);

        if (empty($matakuliah)) {
            return $this->sendError('Matakuliah not found');
        }

        $matakuliah->delete();

        return $this->sendSuccess('Matakuliah deleted successfully');
    }
}
