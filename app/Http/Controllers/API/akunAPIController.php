<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateakunAPIRequest;
use App\Http\Requests\API\UpdateakunAPIRequest;
use App\Models\akun;
use App\Repositories\akunRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class akunController
 * @package App\Http\Controllers\API
 */

class akunAPIController extends AppBaseController
{
    /** @var  akunRepository */
    private $akunRepository;

    public function __construct(akunRepository $akunRepo)
    {
        $this->akunRepository = $akunRepo;
    }

    /**
     * Display a listing of the akun.
     * GET|HEAD /akuns
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $akuns = $this->akunRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($akuns->toArray(), 'Akuns retrieved successfully');
    }

    /**
     * Store a newly created akun in storage.
     * POST /akuns
     *
     * @param CreateakunAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateakunAPIRequest $request)
    {
        $input = $request->all();

        $akun = $this->akunRepository->create($input);

        return $this->sendResponse($akun->toArray(), 'Akun saved successfully');
    }

    /**
     * Display the specified akun.
     * GET|HEAD /akuns/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var akun $akun */
        $akun = $this->akunRepository->find($id);

        if (empty($akun)) {
            return $this->sendError('Akun not found');
        }

        return $this->sendResponse($akun->toArray(), 'Akun retrieved successfully');
    }

    /**
     * Update the specified akun in storage.
     * PUT/PATCH /akuns/{id}
     *
     * @param int $id
     * @param UpdateakunAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateakunAPIRequest $request)
    {
        $input = $request->all();

        /** @var akun $akun */
        $akun = $this->akunRepository->find($id);

        if (empty($akun)) {
            return $this->sendError('Akun not found');
        }

        $akun = $this->akunRepository->update($input, $id);

        return $this->sendResponse($akun->toArray(), 'akun updated successfully');
    }

    /**
     * Remove the specified akun from storage.
     * DELETE /akuns/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var akun $akun */
        $akun = $this->akunRepository->find($id);

        if (empty($akun)) {
            return $this->sendError('Akun not found');
        }

        $akun->delete();

        return $this->sendSuccess('Akun deleted successfully');
    }
}
