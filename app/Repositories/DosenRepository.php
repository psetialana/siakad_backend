<?php

namespace App\Repositories;

use App\Models\Dosen;
use App\Repositories\BaseRepository;

/**
 * Class DosenRepository
 * @package App\Repositories
 * @version November 7, 2022, 1:15 am UTC
*/

class DosenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nip',
        'nama',
        'alamat'
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
        return Dosen::class;
    }
}
