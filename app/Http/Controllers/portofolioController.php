<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateportofolioRequest;
use App\Http\Requests\UpdateportofolioRequest;
use App\Repositories\portofolioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class portofolioController extends AppBaseController
{
    /** @var  portofolioRepository */
    private $portofolioRepository;

    public function __construct(portofolioRepository $portofolioRepo)
    {
        $this->portofolioRepository = $portofolioRepo;
    }

    /**
     * Display a listing of the portofolio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $portofolios = $this->portofolioRepository->all();

        return view('portofolios.index')
            ->with('portofolios', $portofolios);
    }

    /**
     * Show the form for creating a new portofolio.
     *
     * @return Response
     */
    public function create()
    {
        return view('portofolios.create');
    }

    /**
     * Store a newly created portofolio in storage.
     *
     * @param CreateportofolioRequest $request
     *
     * @return Response
     */
    public function store(CreateportofolioRequest $request)
    {
        $input = $request->all();

        $portofolio = $this->portofolioRepository->create($input);

        Flash::success('Portofolio saved successfully.');

        return redirect(route('portofolios.index'));
    }

    /**
     * Display the specified portofolio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $portofolio = $this->portofolioRepository->find($id);

        if (empty($portofolio)) {
            Flash::error('Portofolio not found');

            return redirect(route('portofolios.index'));
        }

        return view('portofolios.show')->with('portofolio', $portofolio);
    }

    /**
     * Show the form for editing the specified portofolio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $portofolio = $this->portofolioRepository->find($id);

        if (empty($portofolio)) {
            Flash::error('Portofolio not found');

            return redirect(route('portofolios.index'));
        }

        return view('portofolios.edit')->with('portofolio', $portofolio);
    }

    /**
     * Update the specified portofolio in storage.
     *
     * @param int $id
     * @param UpdateportofolioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateportofolioRequest $request)
    {
        $portofolio = $this->portofolioRepository->find($id);

        if (empty($portofolio)) {
            Flash::error('Portofolio not found');

            return redirect(route('portofolios.index'));
        }

        $portofolio = $this->portofolioRepository->update($request->all(), $id);

        Flash::success('Portofolio updated successfully.');

        return redirect(route('portofolios.index'));
    }

    /**
     * Remove the specified portofolio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $portofolio = $this->portofolioRepository->find($id);

        if (empty($portofolio)) {
            Flash::error('Portofolio not found');

            return redirect(route('portofolios.index'));
        }

        $this->portofolioRepository->delete($id);

        Flash::success('Portofolio deleted successfully.');

        return redirect(route('portofolios.index'));
    }
}
