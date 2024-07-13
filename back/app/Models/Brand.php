<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Brand extends Model
{
    use HasFactory, HasUuid;



    // scopes
    public function scopeOfCategory(Builder $query, int $categoryId)
    {
        $query->where("category_id", $categoryId);
    }


    // relations
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }


    public static function suppliers(int $categoryId) {
        $supplierIds =  Product::where('category_id', $categoryId)
            ->select('supplier')
            ->get()
            ->pluck('supplier_id')
            ->toArray();
        return Supplier::whereIn('id', $supplierIds)->get();
    }
}
