<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Support\HasUuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Modules\Categories\Models\Category;

class Product extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $fillable = [
        'category_id',
        'description',
    ];

    protected $hidden = [
        'category_id',
        'deleted_at',
        'category'
    ];

    protected $appends = [
        'category_description'
    ];

    public function getCategoryDescriptionAttribute()
    {
        return $this->category->description;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
