<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @method static latest()
 * @method static first()
 * @method static create(array $array)
 * @method static count()
 * @method static status()
 */
class Welcome extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'link',
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

        static::creating(function ($welcome){
            $welcome->created_by = Auth::id() ?? 1;
            $welcome->slug = slug($welcome->title);
        });
        static::updating(function ($welcome){
            $welcome->updated_by = Auth::id();
            $welcome->slug = slug($welcome->title);
        });
    }
}