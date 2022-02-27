<?php

namespace App\Repositories;

use App\Models\layanan;
use App\Repositories\BaseRepository;

/**
 * Class layananRepository
 * @package App\Repositories
 * @version February 27, 2022, 1:41 pm UTC
*/

class layananRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'detail',
        'harga'
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
        return layanan::class;
    }
}
