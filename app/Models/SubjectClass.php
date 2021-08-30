<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectClass extends Model
{
    use HasFactory;
    protected $table = 'subject_classes';
    protected $fillable = [
        'subjectuuid',
        'class_title',
        'class_date',
        'class_link'
    ];
}
