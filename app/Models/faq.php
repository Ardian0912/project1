<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class faq
 * @package App\Models
 * @version February 27, 2022, 1:42 pm UTC
 *
 * @property string $pertanyaan
 * @property string $jawaban
 */
class faq extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'faqs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'pertanyaan',
        'jawaban'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pertanyaan' => 'string',
        'jawaban' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pertanyaan' => 'required',
        'jawaban' => 'required'
    ];

    
}
