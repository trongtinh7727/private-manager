<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address'
    ];

    public function machines()
    {
        return $this->hasMany(machine::class, foreignKey: 'store');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, foreignKey: 'stores');
    }
}
