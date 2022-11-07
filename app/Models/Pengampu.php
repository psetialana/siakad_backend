<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pengampu
 * @package App\Models
 * @version November 7, 2022, 1:22 am UTC
 *
 * @property integer $matakuliahs_id
 * @property integer $dosens_id
 * @property string $tahun_ajaran
 */
class Pengampu extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pengampus';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'matakuliahs_id',
        'dosens_id',
        'tahun_ajaran'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'matakuliahs_id' => 'integer',
        'dosens_id' => 'integer',
        'tahun_ajaran' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matakuliahs_id' => 'required',
        'dosens_id' => 'required'
    ];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliahs_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosens_id');
    }

    
}
