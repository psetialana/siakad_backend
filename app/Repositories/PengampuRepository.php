<?php

namespace App\Repositories;

use App\Models\Pengampu;
use App\Repositories\BaseRepository;

/**
 * Class PengampuRepository
 * @package App\Repositories
 * @version November 7, 2022, 1:22 am UTC
*/

class PengampuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'matakuliahs_id',
        'dosens_id',
        'tahun_ajaran'
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
        return Pengampu::class;
    }
}
