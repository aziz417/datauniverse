<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @method static latest()
 * @method static create(array $array)
 * @method static where(string $string, $choose)
 */
class WhyChoose extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

    public function createdUser()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updatedUser()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($whyChoose){
            $whyChoose->created_by = Auth::id() ?? 1;
        });
        static::updating(function ($whyChoose){
            $whyChoose->updated_by = Auth::id();
        });
    }
}
