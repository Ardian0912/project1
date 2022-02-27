<?php

namespace App\Repositories;

use App\Models\konten;
use App\Repositories\BaseRepository;

/**
 * Class kontenRepository
 * @package App\Repositories
 * @version February 27, 2022, 1:19 pm UTC
*/

class kontenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis',
        'isi'
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
        return konten::class;
    }
}
