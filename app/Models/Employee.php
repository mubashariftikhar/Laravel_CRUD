<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    //  specify the inverse relationship to the Department model:

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
        public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
