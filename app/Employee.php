<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  'position_id', 'salary',
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }

    public function positions()
    {
        return $this->belongsTo(Position::class);
    }

}
