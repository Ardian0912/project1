<?php

namespace App\Repositories;

use App\Models\akun;
use App\Repositories\BaseRepository;

/**
 * Class akunRepository
 * @package App\Repositories
 * @version February 27, 2022, 1:31 pm UTC
*/

class akunRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return akun::class;
    }
}
