<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateakunRequest;
use App\Http\Requests\UpdateakunRequest;
use App\Repositories\akunRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class akunController extends AppBaseController
{
    /** @var  akunRepository */
    private $akunRepository;

    public function __construct(akunRepository $akunRepo)
    {
        $this->akunRepository = $akunRepo;
    }

    /**
     * Display a listing of the akun.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $akuns = $this->akunRepository->all();

        return view('akuns.index')
            ->with('akuns', $akuns);
    }

    /**
     * Show the form for creating a new akun.
     *
     * @return Response
     */
    public function create()
    {
        return view('akuns.create');
    }

    /**
     * Store a newly created akun in storage.
     *
     * @param CreateakunRequest $request
     *
     * @return Response
     */
    public function store(CreateakunRequest $request)
    {
        $input = $request->all();

        $akun = $this->akunRepository->create($input);

        Flash::success('Akun saved successfully.');

        return redirect(route('akuns.index'));
    }

    /**
     * Display the specified akun.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $akun = $this->akunRepository->find($id);

        if (empty($akun)) {
            Flash::error('Akun not found');

            return redirect(route('akuns.index'));
        }

        return view('akuns.show')->with('akun', $akun);
    }

    /**
     * Show the form for editing the specified akun.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $akun = $this->akunRepository->find($id);

        if (empty($akun)) {
            Flash::error('Akun not found');

            return redirect(route('akuns.index'));
        }

        return view('akuns.edit')->with('akun', $akun);
    }

    /**
     * Update the specified akun in storage.
     *
     * @param int $id
     * @param UpdateakunRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateakunRequest $request)
    {
        $akun = $this->akunRepository->find($id);

        if (empty($akun)) {
            Flash::error('Akun not found');

            return redirect(route('akuns.index'));
        }

        $akun = $this->akunRepository->update($request->all(), $id);

        Flash::success('Akun updated successfully.');

        return redirect(route('akuns.index'));
    }

    /**
     * Remove the specified akun from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $akun = $this->akunRepository->find($id);

        if (empty($akun)) {
            Flash::error('Akun not found');

            return redirect(route('akuns.index'));
        }

        $this->akunRepository->delete($id);

        Flash::success('Akun deleted successfully.');

        return redirect(route('akuns.index'));
    }
}
