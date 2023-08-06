<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        '_token'
    ];

    protected $fillable = [
        'name',
        'total_volume',
        'empty_volume',
    ];
}
