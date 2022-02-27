<?php

namespace App\Repositories;

use App\Models\kontak;
use App\Repositories\BaseRepository;

/**
 * Class kontakRepository
 * @package App\Repositories
 * @version February 27, 2022, 1:44 pm UTC
*/

class kontakRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis',
        'isian'
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
        return kontak::class;
    }
}
