<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class konten
 * @package App\Models
 * @version February 27, 2022, 1:19 pm UTC
 *
 * @property string $jenis
 * @property string $isi
 */
class konten extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kontens';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'jenis',
        'isi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis' => 'string',
        'isi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'jenis' => 'required',
        'isi' => 'required'
    ];

    
}
