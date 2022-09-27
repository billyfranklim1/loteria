<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrizeDraw extends Model
{
    use HasFactory;


    const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_FINISHED = 'finished';

    protected $fillable = [
        'name',
        'description',
        'status',
        'n1',
        'n2',
        'n3',
        'n4',
        'n5',
        'n6',
    ];
}
