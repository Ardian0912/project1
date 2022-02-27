<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateportofolioAPIRequest;
use App\Http\Requests\API\UpdateportofolioAPIRequest;
use App\Models\portofolio;
use App\Repositories\portofolioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class portofolioController
 * @package App\Http\Controllers\API
 */

class portofolioAPIController extends AppBaseController
{
    /** @var  portofolioRepository */
    private $portofolioRepository;

    public function __construct(portofolioRepository $portofolioRepo)
    {
        $this->portofolioRepository = $portofolioRepo;
    }

    /**
     * Display a listing of the portofolio.
     * GET|HEAD /portofolios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $portofolios = $this->portofolioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($portofolios->toArray(), 'Portofolios retrieved successfully');
    }

    /**
     * Store a newly created portofolio in storage.
     * POST /portofolios
     *
     * @param CreateportofolioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateportofolioAPIRequest $request)
    {
        $input = $request->all();

        $portofolio = $this->portofolioRepository->create($input);

        return $this->sendResponse($portofolio->toArray(), 'Portofolio saved successfully');
    }

    /**
     * Display the specified portofolio.
     * GET|HEAD /portofolios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var portofolio $portofolio */
        $portofolio = $this->portofolioRepository->find($id);

        if (empty($portofolio)) {
            return $this->sendError('Portofolio not found');
        }

        return $this->sendResponse($portofolio->toArray(), 'Portofolio retrieved successfully');
    }

    /**
     * Update the specified portofolio in storage.
     * PUT/PATCH /portofolios/{id}
     *
     * @param int $id
     * @param UpdateportofolioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateportofolioAPIRequest $request)
    {
        $input = $request->all();

        /** @var portofolio $portofolio */
        $portofolio = $this->portofolioRepository->find($id);

        if (empty($portofolio)) {
            return $this->sendError('Portofolio not found');
        }

        $portofolio = $this->portofolioRepository->update($input, $id);

        return $this->sendResponse($portofolio->toArray(), 'portofolio updated successfully');
    }

    /**
     * Remove the specified portofolio from storage.
     * DELETE /portofolios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var portofolio $portofolio */
        $portofolio = $this->portofolioRepository->find($id);

        if (empty($portofolio)) {
            return $this->sendError('Portofolio not found');
        }

        $portofolio->delete();

        return $this->sendSuccess('Portofolio deleted successfully');
    }
}
