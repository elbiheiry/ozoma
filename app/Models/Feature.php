<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon' , 'name' , 'description'
    ];

    public function delete()
    {
        image_delete($this->icon , 'features');
        
        return parent::delete();
    }
}
