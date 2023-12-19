<?php

namespace App\Modules\Nhansu\src\Repositories\Eloquent;

use App\Modules\Nhansu\src\Models\Employee;
use App\Modules\Nhansu\src\Repositories\Interface\EmployeeRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    protected array $querySearchTargets = ['hoten', 'email', 'manv'];
    public function getBlankModel()
    {
        return new Employee();
    }
}
