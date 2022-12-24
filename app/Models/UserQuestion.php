<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create($contact_details)
 * @method static latest()
 */
class UserQuestion extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'subject', 'message'];

}
