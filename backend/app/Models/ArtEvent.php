<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtEvent extends Model
{
    use HasFactory;

    protected $table = 'art_events';

    protected $fillable = ['id', 'name', 'date', 'description'];
}
