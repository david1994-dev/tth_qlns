<?php

namespace App\Repositories\Interface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function createAccount($input);
}
