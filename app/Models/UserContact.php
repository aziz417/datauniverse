<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $email_details)
 * @method static latest()
 * @method static where(string $string, $userContact)
 * @method static findOrFail($userContact)
 * @method static whereIn(string $string, false|string[] $messages)
 */
class UserContact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'subject', 'message'];

    public function replies(){
        return $this->hasMany(UserContactReply::Class);
    }

}
