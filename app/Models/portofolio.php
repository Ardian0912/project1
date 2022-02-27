<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class portofolio
 * @package App\Models
 * @version February 27, 2022, 1:38 pm UTC
 *
 * @property string $nama
 * @property string $deskripsi
 * @property string $photo
 */
class portofolio extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'portofolios';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'deskripsi',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'deskripsi' => 'string',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'deskripsi' => 'required'
    ];

    
}
