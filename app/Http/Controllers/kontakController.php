<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatekontakRequest;
use App\Http\Requests\UpdatekontakRequest;
use App\Repositories\kontakRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class kontakController extends AppBaseController
{
    /** @var  kontakRepository */
    private $kontakRepository;

    public function __construct(kontakRepository $kontakRepo)
    {
        $this->kontakRepository = $kontakRepo;
    }

    /**
     * Display a listing of the kontak.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kontaks = $this->kontakRepository->all();

        return view('kontaks.index')
            ->with('kontaks', $kontaks);
    }

    /**
     * Show the form for creating a new kontak.
     *
     * @return Response
     */
    public function create()
    {
        return view('kontaks.create');
    }

    /**
     * Store a newly created kontak in storage.
     *
     * @param CreatekontakRequest $request
     *
     * @return Response
     */
    public function store(CreatekontakRequest $request)
    {
        $input = $request->all();

        $kontak = $this->kontakRepository->create($input);

        Flash::success('Kontak saved successfully.');

        return redirect(route('kontaks.index'));
    }

    /**
     * Display the specified kontak.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kontak = $this->kontakRepository->find($id);

        if (empty($kontak)) {
            Flash::error('Kontak not found');

            return redirect(route('kontaks.index'));
        }

        return view('kontaks.show')->with('kontak', $kontak);
    }

    /**
     * Show the form for editing the specified kontak.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kontak = $this->kontakRepository->find($id);

        if (empty($kontak)) {
            Flash::error('Kontak not found');

            return redirect(route('kontaks.index'));
        }

        return view('kontaks.edit')->with('kontak', $kontak);
    }

    /**
     * Update the specified kontak in storage.
     *
     * @param int $id
     * @param UpdatekontakRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekontakRequest $request)
    {
        $kontak = $this->kontakRepository->find($id);

        if (empty($kontak)) {
            Flash::error('Kontak not found');

            return redirect(route('kontaks.index'));
        }

        $kontak = $this->kontakRepository->update($request->all(), $id);

        Flash::success('Kontak updated successfully.');

        return redirect(route('kontaks.index'));
    }

    /**
     * Remove the specified kontak from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kontak = $this->kontakRepository->find($id);

        if (empty($kontak)) {
            Flash::error('Kontak not found');

            return redirect(route('kontaks.index'));
        }

        $this->kontakRepository->delete($id);

        Flash::success('Kontak deleted successfully.');

        return redirect(route('kontaks.index'));
    }
}
