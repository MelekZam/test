<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Supplier extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'uuid',
        'logo',
    ];


    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }
}
