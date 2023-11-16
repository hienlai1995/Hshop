<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserService
{
    protected UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function AddUser($AddData)
    {
        //    kiểm tra đã có người dùng trong hệ thống chưa?
        $indata = $this->userRepository->checkUer($AddData);
        if (empty($indata)) {
            $this->userRepository->store($AddData);
        }
    }
}
