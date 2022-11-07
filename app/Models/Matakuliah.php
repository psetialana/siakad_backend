<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Matakuliah
 * @package App\Models
 * @version October 24, 2022, 1:42 am UTC
 *
 * @property string $kode
 * @property string $nama
 * @property integer $sks
 * @property integer $semester
 */
class Matakuliah extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'matakuliahs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode',
        'nama',
        'sks',
        'semester'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kode' => 'string',
        'nama' => 'string',
        'sks' => 'integer',
        'semester' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode' => 'required',
        'nama' => 'required',
        'sks' => 'numeric',
        'semester' => 'numeric'
    ];

    
}
