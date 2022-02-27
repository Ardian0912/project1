<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatelayananRequest;
use App\Http\Requests\UpdatelayananRequest;
use App\Repositories\layananRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class layananController extends AppBaseController
{
    /** @var  layananRepository */
    private $layananRepository;

    public function __construct(layananRepository $layananRepo)
    {
        $this->layananRepository = $layananRepo;
    }

    /**
     * Display a listing of the layanan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $layanans = $this->layananRepository->all();

        return view('layanans.index')
            ->with('layanans', $layanans);
    }

    /**
     * Show the form for creating a new layanan.
     *
     * @return Response
     */
    public function create()
    {
        return view('layanans.create');
    }

    /**
     * Store a newly created layanan in storage.
     *
     * @param CreatelayananRequest $request
     *
     * @return Response
     */
    public function store(CreatelayananRequest $request)
    {
        $input = $request->all();

        $layanan = $this->layananRepository->create($input);

        Flash::success('Layanan saved successfully.');

        return redirect(route('layanans.index'));
    }

    /**
     * Display the specified layanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $layanan = $this->layananRepository->find($id);

        if (empty($layanan)) {
            Flash::error('Layanan not found');

            return redirect(route('layanans.index'));
        }

        return view('layanans.show')->with('layanan', $layanan);
    }

    /**
     * Show the form for editing the specified layanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $layanan = $this->layananRepository->find($id);

        if (empty($layanan)) {
            Flash::error('Layanan not found');

            return redirect(route('layanans.index'));
        }

        return view('layanans.edit')->with('layanan', $layanan);
    }

    /**
     * Update the specified layanan in storage.
     *
     * @param int $id
     * @param UpdatelayananRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelayananRequest $request)
    {
        $layanan = $this->layananRepository->find($id);

        if (empty($layanan)) {
            Flash::error('Layanan not found');

            return redirect(route('layanans.index'));
        }

        $layanan = $this->layananRepository->update($request->all(), $id);

        Flash::success('Layanan updated successfully.');

        return redirect(route('layanans.index'));
    }

    /**
     * Remove the specified layanan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $layanan = $this->layananRepository->find($id);

        if (empty($layanan)) {
            Flash::error('Layanan not found');

            return redirect(route('layanans.index'));
        }

        $this->layananRepository->delete($id);

        Flash::success('Layanan deleted successfully.');

        return redirect(route('layanans.index'));
    }
}
