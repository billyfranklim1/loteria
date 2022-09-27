<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_WIN = 'win';
    const STATUS_LOSE = 'lose';

    protected $fillable = [
        'code',
        'name',
        'n1',
        'n2',
        'n3',
        'n4',
        'n5',
        'n6',
        'status',
        'prize_draw_id'
    ];

    public function numbers()
    {
        return $this->hasMany(TicketNumber::class);
    }
}
