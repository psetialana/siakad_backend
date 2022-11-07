<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePengampuRequest;
use App\Http\Requests\UpdatePengampuRequest;
use App\Repositories\PengampuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PengampuController extends AppBaseController
{
    /** @var PengampuRepository $pengampuRepository*/
    private $pengampuRepository;

    public function __construct(PengampuRepository $pengampuRepo)
    {
        $this->pengampuRepository = $pengampuRepo;
    }

    /**
     * Display a listing of the Pengampu.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pengampus = $this->pengampuRepository->all();

        return view('pengampus.index')
            ->with('pengampus', $pengampus);
    }

    /**
     * Show the form for creating a new Pengampu.
     *
     * @return Response
     */
    public function create()
    {
        return view('pengampus.create');
    }

    /**
     * Store a newly created Pengampu in storage.
     *
     * @param CreatePengampuRequest $request
     *
     * @return Response
     */
    public function store(CreatePengampuRequest $request)
    {
        $input = $request->all();

        $pengampu = $this->pengampuRepository->create($input);

        Flash::success('Pengampu saved successfully.');

        return redirect(route('pengampus.index'));
    }

    /**
     * Display the specified Pengampu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pengampu = $this->pengampuRepository->find($id);

        if (empty($pengampu)) {
            Flash::error('Pengampu not found');

            return redirect(route('pengampus.index'));
        }

        return view('pengampus.show')->with('pengampu', $pengampu);
    }

    /**
     * Show the form for editing the specified Pengampu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pengampu = $this->pengampuRepository->find($id);

        if (empty($pengampu)) {
            Flash::error('Pengampu not found');

            return redirect(route('pengampus.index'));
        }

        return view('pengampus.edit')->with('pengampu', $pengampu);
    }

    /**
     * Update the specified Pengampu in storage.
     *
     * @param int $id
     * @param UpdatePengampuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePengampuRequest $request)
    {
        $pengampu = $this->pengampuRepository->find($id);

        if (empty($pengampu)) {
            Flash::error('Pengampu not found');

            return redirect(route('pengampus.index'));
        }

        $pengampu = $this->pengampuRepository->update($request->all(), $id);

        Flash::success('Pengampu updated successfully.');

        return redirect(route('pengampus.index'));
    }

    /**
     * Remove the specified Pengampu from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pengampu = $this->pengampuRepository->find($id);

        if (empty($pengampu)) {
            Flash::error('Pengampu not found');

            return redirect(route('pengampus.index'));
        }

        $this->pengampuRepository->delete($id);

        Flash::success('Pengampu deleted successfully.');

        return redirect(route('pengampus.index'));
    }
}
