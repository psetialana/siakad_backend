<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatakuliahRequest;
use App\Http\Requests\UpdateMatakuliahRequest;
use App\Repositories\MatakuliahRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MatakuliahController extends AppBaseController
{
    /** @var MatakuliahRepository $matakuliahRepository*/
    private $matakuliahRepository;

    public function __construct(MatakuliahRepository $matakuliahRepo)
    {
        $this->matakuliahRepository = $matakuliahRepo;
    }

    /**
     * Display a listing of the Matakuliah.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $matakuliahs = $this->matakuliahRepository->all();

        return view('matakuliahs.index')
            ->with('matakuliahs', $matakuliahs);
    }

    /**
     * Show the form for creating a new Matakuliah.
     *
     * @return Response
     */
    public function create()
    {
        return view('matakuliahs.create');
    }

    /**
     * Store a newly created Matakuliah in storage.
     *
     * @param CreateMatakuliahRequest $request
     *
     * @return Response
     */
    public function store(CreateMatakuliahRequest $request)
    {
        $input = $request->all();

        $matakuliah = $this->matakuliahRepository->create($input);

        Flash::success('Matakuliah saved successfully.');

        return redirect(route('matakuliahs.index'));
    }

    /**
     * Display the specified Matakuliah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matakuliah = $this->matakuliahRepository->find($id);

        if (empty($matakuliah)) {
            Flash::error('Matakuliah not found');

            return redirect(route('matakuliahs.index'));
        }

        return view('matakuliahs.show')->with('matakuliah', $matakuliah);
    }

    /**
     * Show the form for editing the specified Matakuliah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matakuliah = $this->matakuliahRepository->find($id);

        if (empty($matakuliah)) {
            Flash::error('Matakuliah not found');

            return redirect(route('matakuliahs.index'));
        }

        return view('matakuliahs.edit')->with('matakuliah', $matakuliah);
    }

    /**
     * Update the specified Matakuliah in storage.
     *
     * @param int $id
     * @param UpdateMatakuliahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatakuliahRequest $request)
    {
        $matakuliah = $this->matakuliahRepository->find($id);

        if (empty($matakuliah)) {
            Flash::error('Matakuliah not found');

            return redirect(route('matakuliahs.index'));
        }

        $matakuliah = $this->matakuliahRepository->update($request->all(), $id);

        Flash::success('Matakuliah updated successfully.');

        return redirect(route('matakuliahs.index'));
    }

    /**
     * Remove the specified Matakuliah from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matakuliah = $this->matakuliahRepository->find($id);

        if (empty($matakuliah)) {
            Flash::error('Matakuliah not found');

            return redirect(route('matakuliahs.index'));
        }

        $this->matakuliahRepository->delete($id);

        Flash::success('Matakuliah deleted successfully.');

        return redirect(route('matakuliahs.index'));
    }
}
