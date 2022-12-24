<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @method static latest()
 * @method static first()
 * @method static create(array $array)
 */
class About extends Model
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

        static::creating(function ($about){
            $about->created_by = Auth::id() ?? 1;
            $about->slug = slug($about->title);

        });
        static::updating(function ($about){
            $about->updated_by = Auth::id();
            $about->slug = slug($about->title);
        });
    }
}
