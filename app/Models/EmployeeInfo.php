<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeInfo extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function branches()
    {
        return $this-> belongsTo(Branch::class);
    }

    public function departments()
    {
        return $this-> belongsTo(Department::class);
    }
}

