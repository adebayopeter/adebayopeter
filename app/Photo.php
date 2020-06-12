<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
    protected $fillable = [
        'file1',
        'file2',
        'file3',
    ];

    protected $uploads = '/images/';

    protected $image_placeholder = '/images/Sample.jpg';

    public function getFileAttribute($photo) {

        return $this->uploads . $photo;

    }

    public function placeholder()
    {
        return $this->image_placeholder;
    }
}
