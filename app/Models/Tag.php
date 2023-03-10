<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @method static create(array $array)
 * @method static latest()
 * @method static status()
 * @method static where(string $string, Tag $tag)
 */
class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'status',
        'created_by',
        'updated_by',
    ];


    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

    public function posts(){
        return $this->belongsToMany(Post::class);
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

        static::creating(function ($tag){
            $tag->created_by = Auth::id() ?? 1;
            $tag->slug = slug($tag->name);

        });
        static::updating(function ($tag){
            $tag->updated_by = Auth::id();
            $tag->slug = slug($tag->name);
        });
    }
}
