<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function user()
    {
        return $this-> belongsTo(User::class,'employee_id','id');
    }

    public function employee()
    {
        return $this-> belongsTo(EmployeeInfo::class);
    }

    public function asset()
    {
        return $this-> belongsTo(AssetInfo::class);
    }

    public function stock()
    {
        return $this-> belongsTo(Stock::class);
    }

    public function branches()
    {
        return $this-> belongsTo(Branch::class);
    }

    public function departments()
    {
        return $this-> belongsTo(Department::class);
    }
}
