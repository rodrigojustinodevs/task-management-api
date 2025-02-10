<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function getAllowedStatuses()
    {
        return ['pending', 'in_progress', 'complete'];
    }

    public function setStatusAttribute($value)
    {
        if (!in_array($value, self::getAllowedStatuses())) {
            throw new \InvalidArgumentException("Invalid status value: $value");
        }
        $this->attributes['status'] = $value;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function scopePaginateTasks($query, $perPage = 10)
    {
        return $query->paginate($perPage);
    }
}
