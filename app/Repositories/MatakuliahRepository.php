<?php

namespace App\Repositories;

use App\Models\Matakuliah;
use App\Repositories\BaseRepository;

/**
 * Class MatakuliahRepository
 * @package App\Repositories
 * @version October 24, 2022, 1:42 am UTC
*/

class MatakuliahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'nama',
        'sks',
        'semester'
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
        return Matakuliah::class;
    }
}
