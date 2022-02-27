<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatekontakAPIRequest;
use App\Http\Requests\API\UpdatekontakAPIRequest;
use App\Models\kontak;
use App\Repositories\kontakRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class kontakController
 * @package App\Http\Controllers\API
 */

class kontakAPIController extends AppBaseController
{
    /** @var  kontakRepository */
    private $kontakRepository;

    public function __construct(kontakRepository $kontakRepo)
    {
        $this->kontakRepository = $kontakRepo;
    }

    /**
     * Display a listing of the kontak.
     * GET|HEAD /kontaks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kontaks = $this->kontakRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kontaks->toArray(), 'Kontaks retrieved successfully');
    }

    /**
     * Store a newly created kontak in storage.
     * POST /kontaks
     *
     * @param CreatekontakAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatekontakAPIRequest $request)
    {
        $input = $request->all();

        $kontak = $this->kontakRepository->create($input);

        return $this->sendResponse($kontak->toArray(), 'Kontak saved successfully');
    }

    /**
     * Display the specified kontak.
     * GET|HEAD /kontaks/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var kontak $kontak */
        $kontak = $this->kontakRepository->find($id);

        if (empty($kontak)) {
            return $this->sendError('Kontak not found');
        }

        return $this->sendResponse($kontak->toArray(), 'Kontak retrieved successfully');
    }

    /**
     * Update the specified kontak in storage.
     * PUT/PATCH /kontaks/{id}
     *
     * @param int $id
     * @param UpdatekontakAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatekontakAPIRequest $request)
    {
        $input = $request->all();

        /** @var kontak $kontak */
        $kontak = $this->kontakRepository->find($id);

        if (empty($kontak)) {
            return $this->sendError('Kontak not found');
        }

        $kontak = $this->kontakRepository->update($input, $id);

        return $this->sendResponse($kontak->toArray(), 'kontak updated successfully');
    }

    /**
     * Remove the specified kontak from storage.
     * DELETE /kontaks/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var kontak $kontak */
        $kontak = $this->kontakRepository->find($id);

        if (empty($kontak)) {
            return $this->sendError('Kontak not found');
        }

        $kontak->delete();

        return $this->sendSuccess('Kontak deleted successfully');
    }
}
