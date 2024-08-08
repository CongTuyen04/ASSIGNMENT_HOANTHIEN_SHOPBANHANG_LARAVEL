<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductComment;
use App\Models\ProductCategory;
use App\Models\User;

use App\Repositories\product\ProductRepository;
use App\Repositories\product\ProductRepositoryInterface;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;

use App\Repositories\productComment\ProductCommentRepository;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Services\ProductComment\ProductCommentService;
use App\Services\ProductComment\ProductCommentServiceInterface;

use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Services\ProductCategory\ProductCategoryService;
use App\Services\ProductCategory\ProductCategoryServiceInterface;

use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;

use Darryldecode\Cart\CartServiceProvider;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Product 
        // $this->app->singleton(
        //     ProductRepositoryInterface::class,
        //     ProductRepository::class
        // );

        // Cái trên bị lỗi cái dưới này chạy dc :))
        // Product 
        $this->app->singleton(
            'App\Repositories\Product\ProductRepositoryInterface',
            'App\Repositories\Product\ProductRepository'
        );

        $this->app->singleton(
            // ProductServiceInterface::class,
            // ProductService::class
            'App\Services\Product\ProductServiceInterface',
            'App\Services\Product\ProductService'
        );

        // Product comment
        $this->app->singleton(
            // ProductCommentRepositoryInterface::class,
            // ProductCommentRepository::class
            'App\Repositories\ProductComment\ProductCommentRepositoryInterface',
            'App\Repositories\ProductComment\ProductCommentRepository'
        );

        $this->app->singleton(
            // ProductCommentServiceInterface::class,
            // ProductCommentService::class
            'App\Services\ProductComment\ProductCommentServiceInterface',
            'App\Services\ProductComment\ProductCommentService'
        );

        // Product Categories
        $this->app->singleton(
            'App\Repositories\ProductCategory\ProductCategoryRepositoryInterface',
            'App\Repositories\ProductCategory\ProductCategoryRepository'
        );

        $this->app->singleton(
            'App\Services\ProductCategory\ProductCategoryServiceInterface',
            'App\Services\ProductCategory\ProductCategoryService'
        );

        // user
        $this->app->singleton(
            'App\Repositories\User\UserRepositoryInterface',
            'App\Repositories\User\UserRepository'
        );

        $this->app->singleton(
            'App\Services\User\UserServiceInterface',
            'App\Services\User\UserService'
        );
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
