<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServingQueue extends Model
{
    use HasFactory;
    protected $table = 'serving_queue';

    protected $fillable = [
        'queue_number',
    ];
}
