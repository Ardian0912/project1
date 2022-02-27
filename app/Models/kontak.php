<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class kontak
 * @package App\Models
 * @version February 27, 2022, 1:44 pm UTC
 *
 * @property string $jenis
 * @property string $isian
 */
class kontak extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kontaks';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'jenis',
        'isian'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis' => 'string',
        'isian' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'jenis' => 'required',
        'isian' => 'required'
    ];

    
}
