<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDosenAPIRequest;
use App\Http\Requests\API\UpdateDosenAPIRequest;
use App\Models\Dosen;
use App\Repositories\DosenRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DosenController
 * @package App\Http\Controllers\API
 */

class DosenAPIController extends AppBaseController
{
    /** @var  DosenRepository */
    private $dosenRepository;

    public function __construct(DosenRepository $dosenRepo)
    {
        $this->dosenRepository = $dosenRepo;
    }

    /**
     * Display a listing of the Dosen.
     * GET|HEAD /dosens
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $dosens = $this->dosenRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($dosens->toArray(), 'Dosens retrieved successfully');
    }

    /**
     * Store a newly created Dosen in storage.
     * POST /dosens
     *
     * @param CreateDosenAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDosenAPIRequest $request)
    {
        $input = $request->all();

        $dosen = $this->dosenRepository->create($input);

        return $this->sendResponse($dosen->toArray(), 'Dosen saved successfully');
    }

    /**
     * Display the specified Dosen.
     * GET|HEAD /dosens/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dosen $dosen */
        $dosen = $this->dosenRepository->find($id);

        if (empty($dosen)) {
            return $this->sendError('Dosen not found');
        }

        return $this->sendResponse($dosen->toArray(), 'Dosen retrieved successfully');
    }

    /**
     * Update the specified Dosen in storage.
     * PUT/PATCH /dosens/{id}
     *
     * @param int $id
     * @param UpdateDosenAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDosenAPIRequest $request)
    {
        $input = $request->all();

        /** @var Dosen $dosen */
        $dosen = $this->dosenRepository->find($id);

        if (empty($dosen)) {
            return $this->sendError('Dosen not found');
        }

        $dosen = $this->dosenRepository->update($input, $id);

        return $this->sendResponse($dosen->toArray(), 'Dosen updated successfully');
    }

    /**
     * Remove the specified Dosen from storage.
     * DELETE /dosens/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dosen $dosen */
        $dosen = $this->dosenRepository->find($id);

        if (empty($dosen)) {
            return $this->sendError('Dosen not found');
        }

        $dosen->delete();

        return $this->sendSuccess('Dosen deleted successfully');
    }
}
