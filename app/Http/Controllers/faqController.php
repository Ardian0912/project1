<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatefaqRequest;
use App\Http\Requests\UpdatefaqRequest;
use App\Repositories\faqRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class faqController extends AppBaseController
{
    /** @var  faqRepository */
    private $faqRepository;

    public function __construct(faqRepository $faqRepo)
    {
        $this->faqRepository = $faqRepo;
    }

    /**
     * Display a listing of the faq.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $faqs = $this->faqRepository->all();

        return view('faqs.index')
            ->with('faqs', $faqs);
    }

    /**
     * Show the form for creating a new faq.
     *
     * @return Response
     */
    public function create()
    {
        return view('faqs.create');
    }

    /**
     * Store a newly created faq in storage.
     *
     * @param CreatefaqRequest $request
     *
     * @return Response
     */
    public function store(CreatefaqRequest $request)
    {
        $input = $request->all();

        $faq = $this->faqRepository->create($input);

        Flash::success('Faq saved successfully.');

        return redirect(route('faqs.index'));
    }

    /**
     * Display the specified faq.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $faq = $this->faqRepository->find($id);

        if (empty($faq)) {
            Flash::error('Faq not found');

            return redirect(route('faqs.index'));
        }

        return view('faqs.show')->with('faq', $faq);
    }

    /**
     * Show the form for editing the specified faq.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $faq = $this->faqRepository->find($id);

        if (empty($faq)) {
            Flash::error('Faq not found');

            return redirect(route('faqs.index'));
        }

        return view('faqs.edit')->with('faq', $faq);
    }

    /**
     * Update the specified faq in storage.
     *
     * @param int $id
     * @param UpdatefaqRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefaqRequest $request)
    {
        $faq = $this->faqRepository->find($id);

        if (empty($faq)) {
            Flash::error('Faq not found');

            return redirect(route('faqs.index'));
        }

        $faq = $this->faqRepository->update($request->all(), $id);

        Flash::success('Faq updated successfully.');

        return redirect(route('faqs.index'));
    }

    /**
     * Remove the specified faq from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $faq = $this->faqRepository->find($id);

        if (empty($faq)) {
            Flash::error('Faq not found');

            return redirect(route('faqs.index'));
        }

        $this->faqRepository->delete($id);

        Flash::success('Faq deleted successfully.');

        return redirect(route('faqs.index'));
    }
}
