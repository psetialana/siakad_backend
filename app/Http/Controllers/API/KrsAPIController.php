<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKrsAPIRequest;
use App\Http\Requests\API\UpdateKrsAPIRequest;
use App\Models\Krs;
use App\Repositories\KrsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KrsController
 * @package App\Http\Controllers\API
 */

class KrsAPIController extends AppBaseController
{
    /** @var  KrsRepository */
    private $krsRepository;

    public function __construct(KrsRepository $krsRepo)
    {
        $this->krsRepository = $krsRepo;
    }

    /**
     * Display a listing of the Krs.
     * GET|HEAD /krs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $krs = $this->krsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($krs->toArray(), 'Krs retrieved successfully');
    }

    /**
     * Store a newly created Krs in storage.
     * POST /krs
     *
     * @param CreateKrsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKrsAPIRequest $request)
    {
        $input = $request->all();

        $krs = $this->krsRepository->create($input);

        return $this->sendResponse($krs->toArray(), 'Krs saved successfully');
    }

    /**
     * Display the specified Krs.
     * GET|HEAD /krs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Krs $krs */
        $krs = $this->krsRepository->find($id);

        if (empty($krs)) {
            return $this->sendError('Krs not found');
        }

        return $this->sendResponse($krs->toArray(), 'Krs retrieved successfully');
    }

    /**
     * Update the specified Krs in storage.
     * PUT/PATCH /krs/{id}
     *
     * @param int $id
     * @param UpdateKrsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKrsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Krs $krs */
        $krs = $this->krsRepository->find($id);

        if (empty($krs)) {
            return $this->sendError('Krs not found');
        }

        $krs = $this->krsRepository->update($input, $id);

        return $this->sendResponse($krs->toArray(), 'Krs updated successfully');
    }

    /**
     * Remove the specified Krs from storage.
     * DELETE /krs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Krs $krs */
        $krs = $this->krsRepository->find($id);

        if (empty($krs)) {
            return $this->sendError('Krs not found');
        }

        $krs->delete();

        return $this->sendSuccess('Krs deleted successfully');
    }
}
