<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectAssign extends Model
{
    use HasFactory;
    protected $table = 'subject_assignment';
    protected $fillable = [
        'subjectuuid',
        'assignment_title',
        'assignment_date',
        'assignment_link'
    ];
}
