<?php

namespace App\Http\Controllers;

use App\Helpers\BackendError;
use App\Helpers\BackendResponse;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Http\Resources\SupplierResrouce;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function getSuggestedSuppliers(Request $request) {
        $category = Category::where('name', $request->categoryName)->first();
        if (!isset($category)) return BackendError::notFound('Cateofry not found');
        $suppliers = Brand::suppliers($category->id);
        return BackendResponse::success([
            'suppliers' => SupplierResrouce::collection($suppliers),
        ]);
    }
}
