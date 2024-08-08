<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        // Calculate the price to be stored in cart
    $priceToAdd = $product->discount ?? $product->price;

    // Example: Adding product to session cart
    $cart = Session::get('cart', []);

    // Check if product is already in cart
    if (isset($cart[$id])) {
        // Increment quantity if product exists in cart
        $cart[$id]['quantity']++;
        // Update total price in cart based on quantity
        $cart[$id]['total_price'] = $cart[$id]['quantity'] * $priceToAdd;
    } else {
        // Add new product to cart with initial quantity and calculated price
        $cart[$id] = [
            'product_id' => $product->id,
            'quantity' => 1,
            'total_price' => $priceToAdd, // Initially set to single item price
        ];
    }

    Session::put('cart', $cart);

    // Return response (you can customize this part based on your frontend needs)
    return response()->json(['message' => 'Product added to cart successfully', 'cart' => $cart]);


    }
    // private $productService;
    // private $cart;

    // public function __construct(ProductServiceInterface $productService)
    // {
    //     $this->productService = $productService;
    // }

    // // public function add($id)
    // // {
    // //     $product = $this->productService->find($id);

    // //     $cartItem = [
    // //         'id' => $product->id,
    // //         'name' => $product->name,
    // //         'qty' => 1,
    // //         'price' => $product->discount ?? $product->price,
    // //         'weight' => $product->weight ?? 0,
    // //         'options' => [
    // //             'images' => $product->productImages,
    // //             'product_category_id' => $product->product_category_id,
    // //         ],
    // //     ];

    // //     $this->cart->add($cartItem);

    // //     return back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    // // }


}