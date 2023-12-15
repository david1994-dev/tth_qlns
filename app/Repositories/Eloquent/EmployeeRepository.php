<?php

namespace App\Repositories\Eloquent;

use App\Models\Employee;
use App\Repositories\Interface\EmployeeRepositoryInterface;

class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    protected array $querySearchTargets = ['hoten', 'email', 'manv'];
    public function getBlankModel()
    {
        return new Employee();
    }
}
