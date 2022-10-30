<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'machine',
        'entry_point',
        'exit_point',
        'created_at'
    ];
    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function new_profit()
    {
        return $this->entry_point - $this->exit_point;
    }

    public function sumOf()
    {
        return $this->new_profit();
    }

    public function machine()
    {
        return $this->belongsTo(machine::class, foreignKey: 'machine');
    }
}
