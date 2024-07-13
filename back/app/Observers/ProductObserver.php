<?php

namespace App\Observers;

use App\Models\Brand;
use App\Models\Product;
use App\Notifications\ProductPriceChanged;
use Illuminate\Support\Facades\Notification;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        if (!$product->wasChanged('price')) return;

        $brands = Brand::ofCategory($product->cateogry_id)->with('user')->get();
        $users = $brands->pluck('user');

        Notification::send($users, new ProductPriceChanged($product));
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
