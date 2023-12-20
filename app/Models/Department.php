<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
   use HasFactory;
    //Define the relationship between the Employee and Department models:
    protected $table='departments';
    public $fillable = ['name'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}

