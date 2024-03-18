<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'title' , 'subtitle' , 'description'
    ];

    public function delete()
    {
        image_delete($this->image , 'testimonials');

        return parent::delete();
    }
}
