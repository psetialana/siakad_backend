<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKrsRequest;
use App\Http\Requests\UpdateKrsRequest;
use App\Repositories\KrsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KrsController extends AppBaseController
{
    /** @var KrsRepository $krsRepository*/
    private $krsRepository;

    public function __construct(KrsRepository $krsRepo)
    {
        $this->krsRepository = $krsRepo;
    }

    /**
     * Display a listing of the Krs.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $krs = $this->krsRepository->all();

        return view('krs.index')
            ->with('krs', $krs);
    }

    /**
     * Show the form for creating a new Krs.
     *
     * @return Response
     */
    public function create()
    {
        return view('krs.create');
    }

    /**
     * Store a newly created Krs in storage.
     *
     * @param CreateKrsRequest $request
     *
     * @return Response
     */
    public function store(CreateKrsRequest $request)
    {
        $input = $request->all();

        $krs = $this->krsRepository->create($input);

        Flash::success('Krs saved successfully.');

        return redirect(route('krs.index'));
    }

    /**
     * Display the specified Krs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $krs = $this->krsRepository->find($id);

        if (empty($krs)) {
            Flash::error('Krs not found');

            return redirect(route('krs.index'));
        }

        return view('krs.show')->with('krs', $krs);
    }

    /**
     * Show the form for editing the specified Krs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $krs = $this->krsRepository->find($id);

        if (empty($krs)) {
            Flash::error('Krs not found');

            return redirect(route('krs.index'));
        }

        return view('krs.edit')->with('krs', $krs);
    }

    /**
     * Update the specified Krs in storage.
     *
     * @param int $id
     * @param UpdateKrsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKrsRequest $request)
    {
        $krs = $this->krsRepository->find($id);

        if (empty($krs)) {
            Flash::error('Krs not found');

            return redirect(route('krs.index'));
        }

        $krs = $this->krsRepository->update($request->all(), $id);

        Flash::success('Krs updated successfully.');

        return redirect(route('krs.index'));
    }

    /**
     * Remove the specified Krs from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $krs = $this->krsRepository->find($id);

        if (empty($krs)) {
            Flash::error('Krs not found');

            return redirect(route('krs.index'));
        }

        $this->krsRepository->delete($id);

        Flash::success('Krs deleted successfully.');

        return redirect(route('krs.index'));
    }
}
