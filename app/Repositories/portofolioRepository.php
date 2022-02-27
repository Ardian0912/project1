<?php

namespace App\Repositories;

use App\Models\portofolio;
use App\Repositories\BaseRepository;

/**
 * Class portofolioRepository
 * @package App\Repositories
 * @version February 27, 2022, 1:38 pm UTC
*/

class portofolioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'deskripsi',
        'photo'
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
        return portofolio::class;
    }
}
