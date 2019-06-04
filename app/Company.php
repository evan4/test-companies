<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'image', 'description', 'email', 'password',
    ];

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function employees()
    {
        return $this->hasmany(Employee::class);
    }

    public function comments()
    {
        return $this->hasmany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getUrlAttribute()
    {
        return route('companies.show', $this->slug);
    }

    public function getImageUrlAttribute($value)
    {
        $image_url = '';;

        if(! is_null($this->image) )
        {
            if(Storage::exists('public/img/'. $this->image)){
                $image_path ='public/img/'. $this->image;

                $image_url = Storage::disk('local')->url($image_path);
            }
        }
        return $image_url;
    }

}
