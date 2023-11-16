<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\AdminRepository;

class AdminService
{
    protected AdminRepository $adminRepository;
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }
    public function addAdmin($AddData)
    {
        //    kiểm tra đã có người dùng trong hệ thống chưa?
        $indata = $this->adminRepository->checkAdmin($AddData);
        if (empty($indata)) {
            // cho phép tạo người dùng mới trả về true
            $this->adminRepository->store($AddData);
        } else {
            //  người dùng đã tồn tại trả về flase
            dd(2);
        }
    }
}
