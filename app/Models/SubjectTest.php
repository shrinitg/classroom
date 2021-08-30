<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectTest extends Model
{
    use HasFactory;
    protected $table = 'subject_test';
    protected $fillable = [
        'subjectuuid',
        'test_name',
        'test_date',
        'test_link'
    ];
}
