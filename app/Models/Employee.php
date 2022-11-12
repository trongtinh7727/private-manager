<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        "email",
        'name',
        'birthday',
        'password',
        'address',
        'level',
        'store_id'
    ];


    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function getStoreName()
    {
        $store = $this->store();
        return $store->get('name')->first()['name'];
    }
}
