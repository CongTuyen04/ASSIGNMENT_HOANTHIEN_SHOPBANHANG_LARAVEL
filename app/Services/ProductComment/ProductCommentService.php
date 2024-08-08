<?php 
namespace App\Services\ProductComment;
use App\Services\BaseService;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;

class ProductCommentService extends BaseService implements ProductCommentServiceInterface
{
    public $repository;

    public function __construct(ProductCommentRepositoryInterface $productCommentRepository)
    {
        $this->repository = $productCommentRepository;
    }
}
?>