<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestDone extends Model
{
    use HasFactory;
    protected $table = 'test_done';
    protected $fillable = [
        'studentId',
        'testId'
    ];
}
