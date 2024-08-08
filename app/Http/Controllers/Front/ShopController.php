<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\ProductComment\ProductCommentServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productService;
    private $productCommentService;
    private $productCategoryService;

    public function __construct(ProductServiceInterface $productService, 
                                ProductCommentServiceInterface $productCommentService, 
                                ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productService = $productService;
        $this->productCommentService = $productCommentService;
        $this->productCategoryService = $productCategoryService;
    }

    // detail product
    public function show($id)
    {
        $categories = $this->productCategoryService->all();
        
        $product = $this->productService->find($id);
        $relatedProduct = $this->productService->getRelatedProducts($product);

        return view('front.shop.show', compact('product', 'relatedProduct', 'categories'));
    }

    public function postComment(Request $request)
    {
        $this->productCommentService->create($request->all());
        return redirect()->back();
    }

    // shop index
    public function index(Request $request)
    {
        $categories = $this->productCategoryService->all();
        $products = $this->productService->getProductOnIndex($request);
        return view('front.shop.index', compact('products', 'categories')); 
    }

    // category
    public function category($categoryName, Request $request)
    {
        $categories = $this->productCategoryService->all();
        $products = $this->productService->getProductsByCategory($categoryName, $request);
        
        return view('front.shop.index', compact('products', 'categories'));
    }
}
?>