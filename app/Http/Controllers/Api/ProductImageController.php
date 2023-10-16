<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImagemProductRequest;
use App\Http\Resources\ProductImageResource;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{

    public function index() {
        $images = ProductImage::all();
        dd($images);
        return ProductImageResource::collection($images);
    }

    public function show(string $product_id)
    {

        $product = Product::findOrFail($product_id);
        $images = $product->images;
        return response()->json([$images]);
    }

    public function store(StoreImagemProductRequest $request, string $product_id)
    {

        $product = Product::findOrFail($product_id);

        $createdImages = [];

        if ($request->hasFile('galery_images')) {
            $images = $request->file('galery_images');

            foreach ($images as $image) {
                $imagePath = $image->store('product_imagens');
                $productImage = new ProductImage([
                    'product_id' => $product->id,
                    'path_image' => '/storage/'.$imagePath
                ]);
                $productImage->save();
                $createdImages[] = [
                    'id' => $productImage->id,
                    'path_image' => $productImage->path_image
                ];
            }
        }

        return response()->json(['created_images' => $createdImages], 201);
    }


    public function destroy(string $product_id)
    {

        $product = Product::findOrFail($product_id);
        $images = $product->images;

        foreach ($images as $image) {
            if (Storage::exists($image->path_image)) {
                Storage::delete($image->path_image);
            }

            $image->delete();
        }

        return response()->json([], 204);
    }
}
