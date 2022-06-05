<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandonUrl extends Model
{
    use HasFactory;
    protected $fillable=['main_url','random_url'];
}
