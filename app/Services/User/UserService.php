<?php 
namespace App\Services\User;
use App\Services\BaseService;
use App\Repositories\User\UserRepositoryInterface;

class UserService extends BaseService implements UserServiceInterface
{
    public $repository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

}
?>