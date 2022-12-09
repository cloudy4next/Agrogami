<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'batch',
        'student_id',
        'bangla',
        'bangla_2nd',
        'english',
        'english_2nd',
        'math',
        'islam',
        'bgs',
        'science',
        'ict',
        'total',
        'gpa',
    ];
}
