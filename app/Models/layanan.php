<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class layanan
 * @package App\Models
 * @version February 27, 2022, 1:41 pm UTC
 *
 * @property string $nama
 * @property string $detail
 * @property string $harga
 */
class layanan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'layanans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'detail',
        'harga'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'detail' => 'string',
        'harga' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'detail' => 'required',
        'harga' => 'required'
    ];

    
}
