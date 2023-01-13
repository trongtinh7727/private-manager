<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'machine_id',
        'entry_point',
        'note',
        'exit_point',
        'date'
    ];
    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function new_profit(): int
    {
        return $this->entry_point - $this->exit_point;
    }

    public function old_profit()
    {
        $Detail = detail::query()->where('machine_id',  $this->machine->id)->where('date', Carbon::create($this->created_at)->subDays(1))->first();
        if ($Detail != null) {
            return $Detail->new_profit();
        }
        return 0;
    }

    public function sumOf()
    {
        return (int) $this->new_profit() - $this->old_profit();
    }

    public function machine()
    {
        return $this->belongsTo(machine::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function store()
    {
        return $this->machine()->store();
    }
}
