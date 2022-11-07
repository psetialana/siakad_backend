<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Krs
 * @package App\Models
 * @version October 24, 2022, 1:49 am UTC
 *
 * @property integer $mahasiswas_id
 * @property integer $matakuliahs_id
 * @property string $tahun_ajaran
 * @property string $nilai
 */
class Krs extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'krs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'mahasiswas_id',
        'matakuliahs_id',
        'tahun_ajaran',
        'nilai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'mahasiswas_id' => 'integer',
        'matakuliahs_id' => 'integer',
        'tahun_ajaran' => 'string',
        'nilai' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mahasiswas_id' => 'numeric',
        'matakuliahs_id' => 'numeric',
        'tahun_ajaran' => 'required'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswas_id');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliahs_id');
    }

    
}
