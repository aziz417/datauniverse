<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @method static create(string[] $array)
 * @method static count()
 * @method static first()
 */
class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'phone_1', 'phone_2', 'telephone', 'email', 'updated_by'];

    public function updatedUser()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

}
