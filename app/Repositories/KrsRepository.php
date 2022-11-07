<?php

namespace App\Repositories;

use App\Models\Krs;
use App\Repositories\BaseRepository;

/**
 * Class KrsRepository
 * @package App\Repositories
 * @version October 24, 2022, 1:49 am UTC
*/

class KrsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mahasiswas_id',
        'matakuliahs_id',
        'tahun_ajaran',
        'nilai'
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
        return Krs::class;
    }
}
