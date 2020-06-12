<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    
    protected $fillable = [
        'name',
        'client_id',
        'category_id',
        'webaddress',
        'photo_id',
        'description',
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function appcategory()
    {
        return $this->belongsTo('App\AppCategory', 'category_id');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
