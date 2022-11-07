<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Dosen
 * @package App\Models
 * @version November 7, 2022, 1:15 am UTC
 *
 * @property string $nip
 * @property string $nama
 * @property string $alamat
 */
class Dosen extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dosens';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nip',
        'nama',
        'alamat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nip' => 'string',
        'nama' => 'string',
        'alamat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nip' => 'required',
        'nama' => 'required'
    ];

    
}
