<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtEvent extends Model
{
    use HasFactory;

    // Define the table if it's not the plural form of the model name
    protected $table = 'art_events';

    // If you want to allow mass assignment
    protected $fillable = ['id', 'name', 'date', 'description'];
}
