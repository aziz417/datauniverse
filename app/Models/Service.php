<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @method static latest()
 * @method static create(array $array)
 * @method static where(string $string, $service)
 */
class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'serial',
        'slug',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
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

        static::creating(function ($service){
            $service->created_by = Auth::id() ?? 1;
            $service->slug = slug(str_replace(['/',',','[',']'], ' ', $service->title));
        });
        static::updating(function ($service){
            $service->updated_by = Auth::id();
            $service->slug = slug(str_replace(['/',',','[',']'], ' ', $service->title));
        });
    }
}
