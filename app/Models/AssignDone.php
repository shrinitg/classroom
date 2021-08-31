<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignDone extends Model
{
    use HasFactory;
    protected $table = 'assign_done';
    protected $fillable = [
        'studentId',
        'assignId'
    ];
}
