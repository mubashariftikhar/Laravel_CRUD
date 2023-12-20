<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Role;

class Role extends Model
{
    use HasFactory;
        //Define the relationship between the Employee and roles models:
    protected $table='roles';
    public $fillable = ['position'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
