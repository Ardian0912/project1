<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatefaqAPIRequest;
use App\Http\Requests\API\UpdatefaqAPIRequest;
use App\Models\faq;
use App\Repositories\faqRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class faqController
 * @package App\Http\Controllers\API
 */

class faqAPIController extends AppBaseController
{
    /** @var  faqRepository */
    private $faqRepository;

    public function __construct(faqRepository $faqRepo)
    {
        $this->faqRepository = $faqRepo;
    }

    /**
     * Display a listing of the faq.
     * GET|HEAD /faqs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $faqs = $this->faqRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($faqs->toArray(), 'Faqs retrieved successfully');
    }

    /**
     * Store a newly created faq in storage.
     * POST /faqs
     *
     * @param CreatefaqAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatefaqAPIRequest $request)
    {
        $input = $request->all();

        $faq = $this->faqRepository->create($input);

        return $this->sendResponse($faq->toArray(), 'Faq saved successfully');
    }

    /**
     * Display the specified faq.
     * GET|HEAD /faqs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var faq $faq */
        $faq = $this->faqRepository->find($id);

        if (empty($faq)) {
            return $this->sendError('Faq not found');
        }

        return $this->sendResponse($faq->toArray(), 'Faq retrieved successfully');
    }

    /**
     * Update the specified faq in storage.
     * PUT/PATCH /faqs/{id}
     *
     * @param int $id
     * @param UpdatefaqAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefaqAPIRequest $request)
    {
        $input = $request->all();

        /** @var faq $faq */
        $faq = $this->faqRepository->find($id);

        if (empty($faq)) {
            return $this->sendError('Faq not found');
        }

        $faq = $this->faqRepository->update($input, $id);

        return $this->sendResponse($faq->toArray(), 'faq updated successfully');
    }

    /**
     * Remove the specified faq from storage.
     * DELETE /faqs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var faq $faq */
        $faq = $this->faqRepository->find($id);

        if (empty($faq)) {
            return $this->sendError('Faq not found');
        }

        $faq->delete();

        return $this->sendSuccess('Faq deleted successfully');
    }
}
