<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamageReq extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function distribution()
    {
        return $this->belongsTo(Distribution::class,'distribuition_id','id');
    }
}
