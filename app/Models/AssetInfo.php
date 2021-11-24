<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetInfo extends Model
{
    use HasFactory;
    //protected $fillable = [ 'email', 'password', ];
    protected $guarded=[];

    public function employeeinfos()

    {
        return $this-> belongsTo(EmployeeInfo::class);
    }
}