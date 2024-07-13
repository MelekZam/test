<?php

namespace App\Models;

use App\Observers\ProductObserver;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([ProductObserver::class])]
class Product extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'category_id',
        'supplier_id',
        'colors',
        'visibility',
        'price',
        'main_picture',
    ];
}
