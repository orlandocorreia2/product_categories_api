<?php

namespace App\Modules\Categories\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Support\HasUuid;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $fillable = [
        'description',
        'status',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value == '1' ? 'active' : 'inactive',
        );
    }
}
