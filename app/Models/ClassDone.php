<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDone extends Model
{
    use HasFactory;
    protected $table = 'class_done';
    protected $fillable = [
        'studentId',
        'classId'
    ];
}
