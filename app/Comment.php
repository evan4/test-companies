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
        'body', 'company_id', 'author',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getAuthorNameAttribute()
    {
        $company = Company::findOrFail($this->author);;
        
        return $company->name;
    }

}
