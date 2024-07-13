<?php

namespace App\Enums;

use App\Traits\HasValues;

enum Role: string
{
    use HasValues;

    case SUPPLIER = 'supplier';
    case BRAND = 'brand';
}
