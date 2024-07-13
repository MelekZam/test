<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
                $model->setAttribute('uuid',Str::uuid()->toString());
        });
    }

    public function uuid()
    {
        return 'uuid';
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getKeyType()
    {
        return 'string';
    }
}