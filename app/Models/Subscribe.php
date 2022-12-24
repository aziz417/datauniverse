<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static latest()
 * @method static findOrFail($subescriber)
 */
class Subscribe extends Model
{
    protected $fillable = ['email'];
    use HasFactory;
}
