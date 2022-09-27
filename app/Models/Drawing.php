<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date_start',
        'date_end',
        'status',
        'n1',
        'n2',
        'n3',
        'n4',
        'n5',
        'n6',
    ];
}
