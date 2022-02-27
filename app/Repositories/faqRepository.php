<?php

namespace App\Repositories;

use App\Models\faq;
use App\Repositories\BaseRepository;

/**
 * Class faqRepository
 * @package App\Repositories
 * @version February 27, 2022, 1:42 pm UTC
*/

class faqRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pertanyaan',
        'jawaban'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return faq::class;
    }
}
