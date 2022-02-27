<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatekontenAPIRequest;
use App\Http\Requests\API\UpdatekontenAPIRequest;
use App\Models\konten;
use App\Repositories\kontenRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class kontenController
 * @package App\Http\Controllers\API
 */

class kontenAPIController extends AppBaseController
{
    /** @var  kontenRepository */
    private $kontenRepository;

    public function __construct(kontenRepository $kontenRepo)
    {
        $this->kontenRepository = $kontenRepo;
    }

    /**
     * Display a listing of the konten.
     * GET|HEAD /kontens
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kontens = $this->kontenRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kontens->toArray(), 'Kontens retrieved successfully');
    }

    /**
     * Store a newly created konten in storage.
     * POST /kontens
     *
     * @param CreatekontenAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatekontenAPIRequest $request)
    {
        $input = $request->all();

        $konten = $this->kontenRepository->create($input);

        return $this->sendResponse($konten->toArray(), 'Konten saved successfully');
    }

    /**
     * Display the specified konten.
     * GET|HEAD /kontens/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var konten $konten */
        $konten = $this->kontenRepository->find($id);

        if (empty($konten)) {
            return $this->sendError('Konten not found');
        }

        return $this->sendResponse($konten->toArray(), 'Konten retrieved successfully');
    }

    /**
     * Update the specified konten in storage.
     * PUT/PATCH /kontens/{id}
     *
     * @param int $id
     * @param UpdatekontenAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekontenAPIRequest $request)
    {
        $input = $request->all();

        /** @var konten $konten */
        $konten = $this->kontenRepository->find($id);

        if (empty($konten)) {
            return $this->sendError('Konten not found');
        }

        $konten = $this->kontenRepository->update($input, $id);

        return $this->sendResponse($konten->toArray(), 'konten updated successfully');
    }

    /**
     * Remove the specified konten from storage.
     * DELETE /kontens/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var konten $konten */
        $konten = $this->kontenRepository->find($id);

        if (empty($konten)) {
            return $this->sendError('Konten not found');
        }

        $konten->delete();

        return $this->sendSuccess('Konten deleted successfully');
    }
}
