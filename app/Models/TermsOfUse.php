<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(int $int)
 */
class TermsOfUse extends Model
{
    use HasFactory;

    protected $fillable = [
        'terms_of_use',
        'created_by',
        'updated_by',
    ];

    public function createdUser()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updatedUser()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
}
