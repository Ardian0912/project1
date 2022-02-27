<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekontenRequest;
use App\Http\Requests\UpdatekontenRequest;
use App\Repositories\kontenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class kontenController extends AppBaseController
{
    /** @var  kontenRepository */
    private $kontenRepository;

    public function __construct(kontenRepository $kontenRepo)
    {
        $this->kontenRepository = $kontenRepo;
    }

    /**
     * Display a listing of the konten.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kontens = $this->kontenRepository->all();

        return view('kontens.index')
            ->with('kontens', $kontens);
    }

    /**
     * Show the form for creating a new konten.
     *
     * @return Response
     */
    public function create()
    {
        return view('kontens.create');
    }

    /**
     * Store a newly created konten in storage.
     *
     * @param CreatekontenRequest $request
     *
     * @return Response
     */
    public function store(CreatekontenRequest $request)
    {
        $input = $request->all();

        $konten = $this->kontenRepository->create($input);

        Flash::success('Konten saved successfully.');

        return redirect(route('kontens.index'));
    }

    /**
     * Display the specified konten.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $konten = $this->kontenRepository->find($id);

        if (empty($konten)) {
            Flash::error('Konten not found');

            return redirect(route('kontens.index'));
        }

        return view('kontens.show')->with('konten', $konten);
    }

    /**
     * Show the form for editing the specified konten.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $konten = $this->kontenRepository->find($id);

        if (empty($konten)) {
            Flash::error('Konten not found');

            return redirect(route('kontens.index'));
        }

        return view('kontens.edit')->with('konten', $konten);
    }

    /**
     * Update the specified konten in storage.
     *
     * @param int $id
     * @param UpdatekontenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekontenRequest $request)
    {
        $konten = $this->kontenRepository->find($id);

        if (empty($konten)) {
            Flash::error('Konten not found');

            return redirect(route('kontens.index'));
        }

        $konten = $this->kontenRepository->update($request->all(), $id);

        Flash::success('Konten updated successfully.');

        return redirect(route('kontens.index'));
    }

    /**
     * Remove the specified konten from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $konten = $this->kontenRepository->find($id);

        if (empty($konten)) {
            Flash::error('Konten not found');

            return redirect(route('kontens.index'));
        }

        $this->kontenRepository->delete($id);

        Flash::success('Konten deleted successfully.');

        return redirect(route('kontens.index'));
    }
}
