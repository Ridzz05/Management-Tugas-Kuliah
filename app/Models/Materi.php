<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis';
    
    protected $fillable = [
        'title',
        'description',
        'file_path',
        'file_name',
        'file_size',
        'schedule',
    ];

    protected $casts = [
        'schedule' => 'datetime'
    ];
}