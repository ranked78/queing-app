<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [
        'name',
        'type_of_transaction',
        'status',
        'registrar'
        // other fields...
    ];
    use HasFactory;
}
