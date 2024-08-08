<?php 
namespace App\Services\ProductCategory;
use App\Services\BaseService;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;

class ProductCategoryService extends BaseService implements ProductCategoryServiceInterface
{
    public $repository;

    public function __construct(ProductCategoryRepositoryInterface $productCategoryRepository)
    {
        $this->repository = $productCategoryRepository;
    }
}
?>