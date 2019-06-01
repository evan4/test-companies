<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',  'company_id',
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }

}
