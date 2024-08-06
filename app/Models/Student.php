<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','phone','level','dateofbirth','address','classroom_id','image'
    ];
    function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}