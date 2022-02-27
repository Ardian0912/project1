<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatelayananAPIRequest;
use App\Http\Requests\API\UpdatelayananAPIRequest;
use App\Models\layanan;
use App\Repositories\layananRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class layananController
 * @package App\Http\Controllers\API
 */

class layananAPIController extends AppBaseController
{
    /** @var  layananRepository */
    private $layananRepository;

    public function __construct(layananRepository $layananRepo)
    {
        $this->layananRepository = $layananRepo;
    }

    /**
     * Display a listing of the layanan.
     * GET|HEAD /layanans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $layanans = $this->layananRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($layanans->toArray(), 'Layanans retrieved successfully');
    }

    /**
     * Store a newly created layanan in storage.
     * POST /layanans
     *
     * @param CreatelayananAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatelayananAPIRequest $request)
    {
        $input = $request->all();

        $layanan = $this->layananRepository->create($input);

        return $this->sendResponse($layanan->toArray(), 'Layanan saved successfully');
    }

    /**
     * Display the specified layanan.
     * GET|HEAD /layanans/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var layanan $layanan */
        $layanan = $this->layananRepository->find($id);

        if (empty($layanan)) {
            return $this->sendError('Layanan not found');
        }

        return $this->sendResponse($layanan->toArray(), 'Layanan retrieved successfully');
    }

    /**
     * Update the specified layanan in storage.
     * PUT/PATCH /layanans/{id}
     *
     * @param int $id
     * @param UpdatelayananAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelayananAPIRequest $request)
    {
        $input = $request->all();

        /** @var layanan $layanan */
        $layanan = $this->layananRepository->find($id);

        if (empty($layanan)) {
            return $this->sendError('Layanan not found');
        }

        $layanan = $this->layananRepository->update($input, $id);

        return $this->sendResponse($layanan->toArray(), 'layanan updated successfully');
    }

    /**
     * Remove the specified layanan from storage.
     * DELETE /layanans/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var layanan $layanan */
        $layanan = $this->layananRepository->find($id);

        if (empty($layanan)) {
            return $this->sendError('Layanan not found');
        }

        $layanan->delete();

        return $this->sendSuccess('Layanan deleted successfully');
    }
}
